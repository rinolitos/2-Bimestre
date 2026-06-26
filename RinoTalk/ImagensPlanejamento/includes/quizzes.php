<?php

function rinotalk_quizzes(): array
{
    return [
        'english' => [
            'name' => 'Inglês',
            'flag' => '🇬🇧',
            'activity' => 'Traduza para o inglês',
            'questions' => [
                ['prompt' => 'Como se diz "casa" em inglês?', 'options' => ['House', 'Horse', 'Cheese', 'Chair'], 'answer' => 'House'],
                ['prompt' => 'Como se diz "obrigado" em inglês?', 'options' => ['Thanks', 'Please', 'Sorry', 'Good night'], 'answer' => 'Thanks'],
                ['prompt' => 'Qual palavra significa "água"?', 'options' => ['Water', 'Window', 'Weather', 'World'], 'answer' => 'Water'],
                ['prompt' => 'Complete: "Good ___!"', 'options' => ['morning', 'green', 'market', 'table'], 'answer' => 'morning'],
                ['prompt' => 'Como se diz "amigo" em inglês?', 'options' => ['Friend', 'Food', 'Family', 'Flower'], 'answer' => 'Friend'],
            ],
        ],
        'italian' => [
            'name' => 'Italiano',
            'flag' => '🇮🇹',
            'activity' => 'Traduza para o italiano',
            'questions' => [
                ['prompt' => 'Como se diz "olá" em italiano?', 'options' => ['Ciao', 'Danke', 'Hola', 'Bonjour'], 'answer' => 'Ciao'],
                ['prompt' => 'Qual palavra significa "casa"?', 'options' => ['Casa', 'Cane', 'Cielo', 'Cena'], 'answer' => 'Casa'],
                ['prompt' => 'Como se diz "obrigado" em italiano?', 'options' => ['Grazie', 'Prego', 'Scusa', 'Notte'], 'answer' => 'Grazie'],
                ['prompt' => 'Qual opção significa "bom dia"?', 'options' => ['Buongiorno', 'Buonanotte', 'Arrivederci', 'Per favore'], 'answer' => 'Buongiorno'],
                ['prompt' => 'Como se diz "água" em italiano?', 'options' => ['Acqua', 'Pane', 'Latte', 'Sole'], 'answer' => 'Acqua'],
            ],
        ],
        'german' => [
            'name' => 'Alemão',
            'flag' => '🇩🇪',
            'activity' => 'Traduza para o alemão',
            'questions' => [
                ['prompt' => 'Como se diz "olá" em alemão?', 'options' => ['Hallo', 'Ciao', 'Salut', 'Adiós'], 'answer' => 'Hallo'],
                ['prompt' => 'Qual palavra significa "obrigado"?', 'options' => ['Danke', 'Bitte', 'Haus', 'Wasser'], 'answer' => 'Danke'],
                ['prompt' => 'Como se diz "casa" em alemão?', 'options' => ['Haus', 'Maus', 'Buch', 'Stadt'], 'answer' => 'Haus'],
                ['prompt' => 'Qual opção significa "água"?', 'options' => ['Wasser', 'Fenster', 'Brot', 'Freund'], 'answer' => 'Wasser'],
                ['prompt' => 'Como se diz "bom dia" em alemão?', 'options' => ['Guten Morgen', 'Gute Nacht', 'Auf Wiedersehen', 'Entschuldigung'], 'answer' => 'Guten Morgen'],
            ],
        ],
        'chinese' => [
            'name' => 'Chinês',
            'flag' => '🇨🇳',
            'activity' => 'Traduza para o chinês',
            'questions' => [
                ['prompt' => 'Como se diz "olá" em chinês?', 'options' => ['Nǐ hǎo', 'Xièxie', 'Zàijiàn', 'Shuǐ'], 'answer' => 'Nǐ hǎo'],
                ['prompt' => 'Qual opção significa "obrigado"?', 'options' => ['Xièxie', 'Nǐ hǎo', 'Jiā', 'Péngyǒu'], 'answer' => 'Xièxie'],
                ['prompt' => 'Como se diz "água" em chinês?', 'options' => ['Shuǐ', 'Māo', 'Shū', 'Fàn'], 'answer' => 'Shuǐ'],
                ['prompt' => 'Qual palavra significa "casa/família"?', 'options' => ['Jiā', 'Hǎo', 'Rén', 'Tiān'], 'answer' => 'Jiā'],
                ['prompt' => 'Como se diz "amigo" em chinês?', 'options' => ['Péngyǒu', 'Lǎoshī', 'Xuésheng', 'Míngtiān'], 'answer' => 'Péngyǒu'],
            ],
        ],
        'french' => [
            'name' => 'Francês',
            'flag' => '🇫🇷',
            'activity' => 'Traduza para o francês',
            'questions' => [
                ['prompt' => 'Como se diz "olá" em francês?', 'options' => ['Bonjour', 'Gracias', 'Danke', 'Ciao'], 'answer' => 'Bonjour'],
                ['prompt' => 'Qual palavra significa "obrigado"?', 'options' => ['Merci', 'Maison', 'Eau', 'Ami'], 'answer' => 'Merci'],
                ['prompt' => 'Como se diz "casa" em francês?', 'options' => ['Maison', 'Matin', 'Mère', 'Marché'], 'answer' => 'Maison'],
                ['prompt' => 'Qual opção significa "água"?', 'options' => ['Eau', 'Pain', 'Livre', 'Soleil'], 'answer' => 'Eau'],
                ['prompt' => 'Como se diz "amigo" em francês?', 'options' => ['Ami', 'Jour', 'Chat', 'Rue'], 'answer' => 'Ami'],
            ],
        ],
        'spanish' => [
            'name' => 'Espanhol',
            'flag' => '🇪🇸',
            'activity' => 'Traduza para o espanhol',
            'questions' => [
                ['prompt' => 'Como se diz "olá" em espanhol?', 'options' => ['Hola', 'Ciao', 'Hallo', 'Bonjour'], 'answer' => 'Hola'],
                ['prompt' => 'Qual palavra significa "obrigado"?', 'options' => ['Gracias', 'Casa', 'Agua', 'Amigo'], 'answer' => 'Gracias'],
                ['prompt' => 'Como se diz "bom dia" em espanhol?', 'options' => ['Buenos días', 'Buenas noches', 'Hasta luego', 'Por favor'], 'answer' => 'Buenos días'],
                ['prompt' => 'Qual opção significa "água"?', 'options' => ['Agua', 'Pan', 'Libro', 'Mesa'], 'answer' => 'Agua'],
                ['prompt' => 'Como se diz "amigo" em espanhol?', 'options' => ['Amigo', 'Ciudad', 'Escuela', 'Tiempo'], 'answer' => 'Amigo'],
            ],
        ],
    ];
}
