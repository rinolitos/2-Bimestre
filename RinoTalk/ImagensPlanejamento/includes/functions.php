<?php

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }

    return $_SESSION['csrf_token'];
}

function csrf_is_valid(?string $token): bool
{
    return is_string($token) && hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

function start_quiz(string $languageKey, array $quizzes): void
{
    if (!isset($quizzes[$languageKey])) {
        $languageKey = array_key_first($quizzes);
    }

    $_SESSION['quiz'] = [
        'language' => $languageKey,
        'question' => 0,
        'correct' => 0,
        'answers' => [],
        'started_at' => time(),
        'finished' => false,
    ];
}

function current_quiz(array $quizzes): array
{
    if (empty($_SESSION['quiz']) || !isset($quizzes[$_SESSION['quiz']['language']])) {
        start_quiz(array_key_first($quizzes), $quizzes);
    }

    return $_SESSION['quiz'];
}

function calculate_score(int $correct, int $total): int
{
    $baseScore = $correct * 180;
    $completionBonus = $correct === $total ? 100 : 0;

    return $baseScore + $completionBonus;
}

function result_message(int $score): string
{
    if ($score >= 900) {
        return 'Excelente! Você conquistou uma rodada quase perfeita.';
    }

    if ($score >= 540) {
        return 'Bom resultado. Continue praticando para subir a pontuação.';
    }

    return 'Não desanime. Tente novamente e fortaleça o vocabulário.';
}

function scores_path(): string
{
    return __DIR__ . '/../data/scores.json';
}

function read_scores(): array
{
    $path = scores_path();

    if (!is_file($path)) {
        return [];
    }

    $json = file_get_contents($path);
    $scores = json_decode($json ?: '[]', true);

    return is_array($scores) ? $scores : [];
}

function save_score(array $entry): void
{
    $path = scores_path();
    $directory = dirname($path);

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    $scores = read_scores();
    $scores[] = $entry;
    usort($scores, fn ($a, $b) => ($b['score'] ?? 0) <=> ($a['score'] ?? 0));
    $scores = array_slice($scores, 0, 20);

    file_put_contents(
        $path,
        json_encode($scores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
}

function top_scores(int $limit = 5): array
{
    return array_slice(read_scores(), 0, $limit);
}

function answer_question(string $selectedAnswer, array $quizzes): void
{
    $state = current_quiz($quizzes);
    $languageKey = $state['language'];
    $quiz = $quizzes[$languageKey];
    $questionIndex = (int) $state['question'];
    $question = $quiz['questions'][$questionIndex] ?? null;

    if (!$question || !in_array($selectedAnswer, $question['options'], true)) {
        return;
    }

    $isCorrect = $selectedAnswer === $question['answer'];
    $state['answers'][] = [
        'prompt' => $question['prompt'],
        'selected' => $selectedAnswer,
        'correct_answer' => $question['answer'],
        'is_correct' => $isCorrect,
    ];

    if ($isCorrect) {
        $state['correct']++;
    }

    $state['question']++;
    $total = count($quiz['questions']);

    if ($state['question'] >= $total) {
        $state['finished'] = true;
        $state['score'] = calculate_score((int) $state['correct'], $total);
        $state['finished_at'] = time();

        save_score([
            'language' => $quiz['name'],
            'flag' => $quiz['flag'],
            'score' => $state['score'],
            'correct' => $state['correct'],
            'total' => $total,
            'date' => date('d/m/Y H:i'),
        ]);
    }

    $_SESSION['quiz'] = $state;
}

function next_language_key(string $currentKey, array $quizzes): string
{
    $keys = array_keys($quizzes);
    $index = array_search($currentKey, $keys, true);

    if ($index === false) {
        return $keys[0];
    }

    return $keys[($index + 1) % count($keys)];
}
