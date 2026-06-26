const quizzes = {
  english: {
    name: "Inglês",
    flag: "🇬🇧",
    activity: "Traduza para o inglês",
    questions: [
      {
        prompt: 'Como se diz "casa" em inglês?',
        options: ["House", "Horse", "Cheese", "Chair"],
        answer: "House",
      },
      {
        prompt: 'Como se diz "obrigado" em inglês?',
        options: ["Thanks", "Please", "Sorry", "Good night"],
        answer: "Thanks",
      },
      {
        prompt: 'Qual palavra significa "água"?',
        options: ["Water", "Window", "Weather", "World"],
        answer: "Water",
      },
      {
        prompt: 'Complete: "Good ___!"',
        options: ["morning", "green", "market", "table"],
        answer: "morning",
      },
      {
        prompt: 'Como se diz "amigo" em inglês?',
        options: ["Friend", "Food", "Family", "Flower"],
        answer: "Friend",
      },
    ],
  },
  italian: {
    name: "Italiano",
    flag: "🇮🇹",
    activity: "Traduza para o italiano",
    questions: [
      {
        prompt: 'Como se diz "olá" em italiano?',
        options: ["Ciao", "Danke", "Hola", "Bonjour"],
        answer: "Ciao",
      },
      {
        prompt: 'Qual palavra significa "casa"?',
        options: ["Casa", "Cane", "Cielo", "Cena"],
        answer: "Casa",
      },
      {
        prompt: 'Como se diz "obrigado" em italiano?',
        options: ["Grazie", "Prego", "Scusa", "Notte"],
        answer: "Grazie",
      },
      {
        prompt: 'Qual opção significa "bom dia"?',
        options: ["Buongiorno", "Buonanotte", "Arrivederci", "Per favore"],
        answer: "Buongiorno",
      },
      {
        prompt: 'Como se diz "água" em italiano?',
        options: ["Acqua", "Pane", "Latte", "Sole"],
        answer: "Acqua",
      },
    ],
  },
  german: {
    name: "Alemão",
    flag: "🇩🇪",
    activity: "Traduza para o alemão",
    questions: [
      {
        prompt: 'Como se diz "olá" em alemão?',
        options: ["Hallo", "Ciao", "Salut", "Adiós"],
        answer: "Hallo",
      },
      {
        prompt: 'Qual palavra significa "obrigado"?',
        options: ["Danke", "Bitte", "Haus", "Wasser"],
        answer: "Danke",
      },
      {
        prompt: 'Como se diz "casa" em alemão?',
        options: ["Haus", "Maus", "Buch", "Stadt"],
        answer: "Haus",
      },
      {
        prompt: 'Qual opção significa "água"?',
        options: ["Wasser", "Fenster", "Brot", "Freund"],
        answer: "Wasser",
      },
      {
        prompt: 'Como se diz "bom dia" em alemão?',
        options: ["Guten Morgen", "Gute Nacht", "Auf Wiedersehen", "Entschuldigung"],
        answer: "Guten Morgen",
      },
    ],
  },
  chinese: {
    name: "Chinês",
    flag: "🇨🇳",
    activity: "Traduza para o chinês",
    questions: [
      {
        prompt: 'Como se diz "olá" em chinês?',
        options: ["Nǐ hǎo", "Xièxie", "Zàijiàn", "Shuǐ"],
        answer: "Nǐ hǎo",
      },
      {
        prompt: 'Qual opção significa "obrigado"?',
        options: ["Xièxie", "Nǐ hǎo", "Jiā", "Péngyǒu"],
        answer: "Xièxie",
      },
      {
        prompt: 'Como se diz "água" em chinês?',
        options: ["Shuǐ", "Māo", "Shū", "Fàn"],
        answer: "Shuǐ",
      },
      {
        prompt: 'Qual palavra significa "casa/família"?',
        options: ["Jiā", "Hǎo", "Rén", "Tiān"],
        answer: "Jiā",
      },
      {
        prompt: 'Como se diz "amigo" em chinês?',
        options: ["Péngyǒu", "Lǎoshī", "Xuésheng", "Míngtiān"],
        answer: "Péngyǒu",
      },
    ],
  },
  french: {
    name: "Francês",
    flag: "🇫🇷",
    activity: "Traduza para o francês",
    questions: [
      {
        prompt: 'Como se diz "olá" em francês?',
        options: ["Bonjour", "Gracias", "Danke", "Ciao"],
        answer: "Bonjour",
      },
      {
        prompt: 'Qual palavra significa "obrigado"?',
        options: ["Merci", "Maison", "Eau", "Ami"],
        answer: "Merci",
      },
      {
        prompt: 'Como se diz "casa" em francês?',
        options: ["Maison", "Matin", "Mère", "Marché"],
        answer: "Maison",
      },
      {
        prompt: 'Qual opção significa "água"?',
        options: ["Eau", "Pain", "Livre", "Soleil"],
        answer: "Eau",
      },
      {
        prompt: 'Como se diz "amigo" em francês?',
        options: ["Ami", "Jour", "Chat", "Rue"],
        answer: "Ami",
      },
    ],
  },
  spanish: {
    name: "Espanhol",
    flag: "🇪🇸",
    activity: "Traduza para o espanhol",
    questions: [
      {
        prompt: 'Como se diz "olá" em espanhol?',
        options: ["Hola", "Ciao", "Hallo", "Bonjour"],
        answer: "Hola",
      },
      {
        prompt: 'Qual palavra significa "obrigado"?',
        options: ["Gracias", "Casa", "Agua", "Amigo"],
        answer: "Gracias",
      },
      {
        prompt: 'Como se diz "bom dia" em espanhol?',
        options: ["Buenos días", "Buenas noches", "Hasta luego", "Por favor"],
        answer: "Buenos días",
      },
      {
        prompt: 'Qual opção significa "água"?',
        options: ["Agua", "Pan", "Libro", "Mesa"],
        answer: "Agua",
      },
      {
        prompt: 'Como se diz "amigo" em espanhol?',
        options: ["Amigo", "Ciudad", "Escuela", "Tiempo"],
        answer: "Amigo",
      },
    ],
  },
};

const languageButtons = document.querySelectorAll(".lang-card");
const currentFlag = document.querySelector("#currentFlag");
const currentLanguage = document.querySelector("#currentLanguage");
const progressLabel = document.querySelector("#progressLabel");
const progressFill = document.querySelector("#progressFill");
const activityLabel = document.querySelector("#activityLabel");
const questionText = document.querySelector("#questionText");
const answerGrid = document.querySelector("#answerGrid");
const feedback = document.querySelector("#feedback");
const quizStage = document.querySelector("#quizStage");
const resultStage = document.querySelector("#resultStage");
const finalScore = document.querySelector("#finalScore");
const resultMessage = document.querySelector("#resultMessage");
const retryButton = document.querySelector("#retryButton");
const nextLanguageButton = document.querySelector("#nextLanguageButton");

let activeLanguage = "english";
let currentQuestion = 0;
let correctAnswers = 0;
let locked = false;

function setLanguage(languageKey) {
  activeLanguage = languageKey;
  currentQuestion = 0;
  correctAnswers = 0;
  locked = false;

  languageButtons.forEach((button) => {
    button.classList.toggle("active", button.dataset.lang === languageKey);
  });

  const quiz = quizzes[activeLanguage];
  currentFlag.textContent = quiz.flag;
  currentLanguage.textContent = quiz.name;
  activityLabel.textContent = quiz.activity;
  quizStage.hidden = false;
  resultStage.hidden = true;
  renderQuestion();
}

function renderQuestion() {
  const quiz = quizzes[activeLanguage];
  const question = quiz.questions[currentQuestion];
  const total = quiz.questions.length;

  locked = false;
  feedback.textContent = "";
  progressLabel.textContent = `Pergunta ${currentQuestion + 1} de ${total}`;
  progressFill.style.width = `${((currentQuestion + 1) / total) * 100}%`;
  questionText.textContent = question.prompt;
  answerGrid.innerHTML = "";

  question.options.forEach((option) => {
    const button = document.createElement("button");
    button.className = "answer-button";
    button.type = "button";
    button.textContent = option;
    button.addEventListener("click", () => chooseAnswer(button, option));
    answerGrid.appendChild(button);
  });
}

function chooseAnswer(button, selectedAnswer) {
  if (locked) return;
  locked = true;

  const quiz = quizzes[activeLanguage];
  const question = quiz.questions[currentQuestion];
  const isCorrect = selectedAnswer === question.answer;

  if (isCorrect) {
    correctAnswers += 1;
    button.classList.add("correct");
    feedback.textContent = "Boa! Você acertou.";
  } else {
    button.classList.add("wrong");
    feedback.textContent = `Quase. A resposta certa é ${question.answer}.`;
  }

  answerGrid.querySelectorAll(".answer-button").forEach((answerButton) => {
    answerButton.disabled = true;
    if (answerButton.textContent === question.answer) {
      answerButton.classList.add("correct");
    }
  });

  window.setTimeout(() => {
    currentQuestion += 1;

    if (currentQuestion >= quiz.questions.length) {
      showResult();
      return;
    }

    renderQuestion();
  }, 950);
}

function showResult() {
  const total = quizzes[activeLanguage].questions.length;
  const baseScore = correctAnswers * 180;
  const completionBonus = correctAnswers === total ? 100 : 0;
  const score = baseScore + completionBonus;

  quizStage.hidden = true;
  resultStage.hidden = false;
  finalScore.textContent = `${score} pontos`;

  if (score >= 900) {
    resultMessage.textContent = "Excelente! Você conquistou uma rodada quase perfeita.";
  } else if (score >= 540) {
    resultMessage.textContent = "Bom resultado. Continue praticando para subir a pontuação.";
  } else {
    resultMessage.textContent = "Não desanime. Tente novamente e fortaleça o vocabulário.";
  }
}

function selectNextLanguage() {
  const keys = Object.keys(quizzes);
  const nextIndex = (keys.indexOf(activeLanguage) + 1) % keys.length;
  setLanguage(keys[nextIndex]);
  document.querySelector("#atividade").scrollIntoView({ behavior: "smooth" });
}

languageButtons.forEach((button) => {
  button.addEventListener("click", () => {
    setLanguage(button.dataset.lang);
    document.querySelector("#atividade").scrollIntoView({ behavior: "smooth" });
  });
});

retryButton.addEventListener("click", () => setLanguage(activeLanguage));
nextLanguageButton.addEventListener("click", selectNextLanguage);

setLanguage(activeLanguage);
