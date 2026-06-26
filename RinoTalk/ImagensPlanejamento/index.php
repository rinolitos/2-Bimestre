<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/includes/quizzes.php';
require __DIR__ . '/includes/functions.php';

$quizzes = rinotalk_quizzes();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_is_valid($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';
    $state = current_quiz($quizzes);

    if ($action === 'select_language') {
        start_quiz((string) ($_POST['language'] ?? ''), $quizzes);
    }

    if ($action === 'answer') {
        answer_question((string) ($_POST['answer'] ?? ''), $quizzes);
    }

    if ($action === 'retry') {
        start_quiz((string) ($state['language'] ?? array_key_first($quizzes)), $quizzes);
    }

    if ($action === 'next_language') {
        start_quiz(next_language_key((string) ($state['language'] ?? array_key_first($quizzes)), $quizzes), $quizzes);
    }

    header('Location: index.php#atividade');
    exit;
}

$state = current_quiz($quizzes);
$languageKey = $state['language'];
$activeQuiz = $quizzes[$languageKey];
$questions = $activeQuiz['questions'];
$totalQuestions = count($questions);
$currentIndex = min((int) $state['question'], $totalQuestions - 1);
$currentQuestion = $questions[$currentIndex];
$finished = (bool) ($state['finished'] ?? false);
$progress = $finished ? 100 : (($currentIndex + 1) / $totalQuestions) * 100;
$score = (int) ($state['score'] ?? 0);
$topScores = top_scores();
$token = csrf_token();
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RinoTalk | Quiz de idiomas em PHP</title>
    <meta
      name="description"
      content="RinoTalk é um quiz de idiomas com PHP, sessão, formulários, pontuação e ranking local."
    />
    <script>
      try {
        const savedTheme = localStorage.getItem("rinotalk-theme");
        if (savedTheme === "dark") {
          document.documentElement.dataset.theme = "dark";
        }
      } catch (error) {
        document.documentElement.dataset.theme = "light";
      }
    </script>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header class="site-header">
      <a class="brand" href="#atividade" aria-label="RinoTalk início">
        <img src="./logo.png" alt="RinoTalk" />
      </a>
      <nav class="main-nav" aria-label="Navegação principal">
        <a href="#atividade">Atividade</a>
        <a href="#idiomas">Idiomas</a>
        <a href="#ranking">Ranking</a>
      </nav>
      <button class="theme-toggle" type="button" id="themeToggle" aria-pressed="false">
        <span class="theme-track" aria-hidden="true">
          <span class="theme-thumb"></span>
        </span>
        <span id="themeLabel">Modo escuro</span>
      </button>
    </header>

    <main>
      <section class="quiz-hero" id="atividade">
        <div class="quiz-copy">
          <p class="eyebrow">Aprenda. Pratique. Conquiste o mundo.</p>
          <h1>Escolha um idioma e faça o desafio do RinoTalk.</h1>
          <p>
            Agora o quiz usa PHP para guardar a rodada, conferir respostas,
            calcular a pontuação e salvar os melhores resultados.
          </p>
          <div class="score-preview" aria-label="Pontuação possível">
            <span>Até</span>
            <strong>1000</strong>
            <span>pontos</span>
          </div>
        </div>

        <section class="quiz-panel" aria-label="Quiz de idiomas">
          <div class="quiz-topbar">
            <img src="./logo footer.png" alt="RinoTalk" />
            <div>
              <span aria-hidden="true"><?= h($activeQuiz['flag']) ?></span>
              <strong><?= h($activeQuiz['name']) ?></strong>
            </div>
          </div>

          <div class="quiz-progress">
            <span><?= $finished ? 'Atividade finalizada' : 'Pergunta ' . ($currentIndex + 1) . ' de ' . $totalQuestions ?></span>
            <div aria-hidden="true">
              <span style="width: <?= h((string) $progress) ?>%"></span>
            </div>
          </div>

          <?php if ($finished): ?>
            <div class="result-stage">
              <img src="./congratulations (1).png" alt="Mascote RinoTalk comemorando" />
              <p class="activity-label">Atividade finalizada</p>
              <h2>Sua pontuação:</h2>
              <strong id="finalScore"><?= $score ?> pontos</strong>
              <p><?= h(result_message($score)) ?></p>
              <div class="result-actions">
                <form method="post">
                  <input type="hidden" name="csrf_token" value="<?= h($token) ?>" />
                  <input type="hidden" name="action" value="retry" />
                  <button class="primary-button" type="submit">Tentar novamente</button>
                </form>
                <form method="post">
                  <input type="hidden" name="csrf_token" value="<?= h($token) ?>" />
                  <input type="hidden" name="action" value="next_language" />
                  <button class="secondary-button" type="submit">Outro idioma</button>
                </form>
              </div>
            </div>
          <?php else: ?>
            <div class="quiz-stage">
              <p class="activity-label"><?= h($activeQuiz['activity']) ?></p>
              <h2><?= h($currentQuestion['prompt']) ?></h2>
              <form class="answer-grid" method="post">
                <input type="hidden" name="csrf_token" value="<?= h($token) ?>" />
                <input type="hidden" name="action" value="answer" />
                <?php foreach ($currentQuestion['options'] as $option): ?>
                  <button class="answer-button" type="submit" name="answer" value="<?= h($option) ?>">
                    <?= h($option) ?>
                  </button>
                <?php endforeach; ?>
              </form>
            </div>
          <?php endif; ?>
        </section>
      </section>

      <section class="language-section" id="idiomas">
        <div class="section-heading">
          <p class="eyebrow">Idiomas</p>
          <h2>Escolha sua próxima atividade.</h2>
        </div>
        <div class="language-picker" aria-label="Idiomas disponíveis">
          <?php foreach ($quizzes as $key => $quiz): ?>
            <form method="post">
              <input type="hidden" name="csrf_token" value="<?= h($token) ?>" />
              <input type="hidden" name="action" value="select_language" />
              <input type="hidden" name="language" value="<?= h($key) ?>" />
              <button class="lang-card <?= $key === $languageKey ? 'active' : '' ?>" type="submit">
                <span aria-hidden="true"><?= h($quiz['flag']) ?></span>
                <strong><?= h($quiz['name']) ?></strong>
              </button>
            </form>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="dashboard-section" id="ranking">
        <div class="section-heading">
          <p class="eyebrow">Ranking local</p>
          <h2>Melhores pontuações salvas pelo PHP.</h2>
        </div>
        <div class="dashboard-grid">
          <article class="dashboard-card">
            <h3>Rodada atual</h3>
            <dl class="summary-list">
              <div>
                <dt>Idioma</dt>
                <dd><?= h($activeQuiz['name']) ?></dd>
              </div>
              <div>
                <dt>Acertos</dt>
                <dd><?= (int) $state['correct'] ?> / <?= $totalQuestions ?></dd>
              </div>
              <div>
                <dt>Status</dt>
                <dd><?= $finished ? 'Finalizada' : 'Em andamento' ?></dd>
              </div>
            </dl>
          </article>

          <article class="dashboard-card">
            <h3>Top 5</h3>
            <?php if ($topScores): ?>
              <ol class="ranking-list">
                <?php foreach ($topScores as $entry): ?>
                  <li>
                    <span><?= h(($entry['flag'] ?? '') . ' ' . ($entry['language'] ?? 'Idioma')) ?></span>
                    <strong><?= (int) ($entry['score'] ?? 0) ?> pts</strong>
                  </li>
                <?php endforeach; ?>
              </ol>
            <?php else: ?>
              <p class="empty-state">Finalize uma atividade para criar o primeiro resultado.</p>
            <?php endif; ?>
          </article>

          <?php if (!empty($state['answers'])): ?>
            <article class="dashboard-card review-card">
              <h3>Revisão da rodada</h3>
              <ul class="review-list">
                <?php foreach ($state['answers'] as $answer): ?>
                  <li class="<?= $answer['is_correct'] ? 'correct' : 'wrong' ?>">
                    <strong><?= $answer['is_correct'] ? 'Acertou' : 'Errou' ?></strong>
                    <span><?= h($answer['prompt']) ?></span>
                    <small>Sua resposta: <?= h($answer['selected']) ?> | Correta: <?= h($answer['correct_answer']) ?></small>
                  </li>
                <?php endforeach; ?>
              </ul>
            </article>
          <?php endif; ?>
        </div>
      </section>

      <section class="screens-section" id="telas">
        <div class="section-heading">
          <p class="eyebrow">Referência visual</p>
          <h2>As atividades seguem a linguagem das telas do app.</h2>
        </div>
        <div class="phone-gallery" aria-label="Telas do aplicativo">
          <img class="phone-shot" src="./Captura de tela 2026-06-19 014246.png" alt="Tela de seleção de idiomas do RinoTalk" />
          <img class="phone-shot" src="./Captura de tela 2026-06-19 014253.png" alt="Tela de atividade finalizada com pontuação alta" />
          <img class="phone-shot" src="./Captura de tela 2026-06-19 014306.png" alt="Tela de tentativa com pontuação e incentivo" />
          <img class="phone-shot" src="./Captura de tela 2026-06-19 014316.png" alt="Tela de gráfico de evolução mensal" />
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <img src="./logo.png" alt="RinoTalk" />
      <p>Aprenda. Pratique. Conquiste o mundo.</p>
    </footer>

    <script src="script.js"></script>
  </body>
</html>
