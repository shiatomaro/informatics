import { quizData } from "./exam_questions.js";

const quiz= document.getElementById('quiz');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const submitBtn = document.getElementById('submit');
const quiz_form = document.getElementById('quiz_form');
const form_score = document.getElementById('form_score');
let currentQuiz = 0;
let score = 0;
form_score.value = 0;


// sets the data on the quiz card
function loadQuiz() {
  deselectAnswers()
  const currentQuizData = quizData[currentQuiz]
  questionEl.innerText = currentQuizData.question
  a_text.innerText = currentQuizData.a
  b_text.innerText = currentQuizData.b
  c_text.innerText = currentQuizData.c
  d_text.innerText = currentQuizData.d
}

// removes the check from the checkboxes
function deselectAnswers() {
  answerEls.forEach(answerEl => answerEl.checked = false)
}

// get selected answer
function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}

submitBtn.addEventListener('click', () => {
  const answer = getSelected()
  if(answer) {
      if(answer === quizData[currentQuiz].correct) {
          score++
          form_score.value = score;
      }
      currentQuiz++
      if(currentQuiz < quizData.length) {
          loadQuiz()
      } else {

        quiz_form.submit();
        quiz.innerHTML = `
        <h2>You answered ${score}/${quizData.length} questions correctly</h2>
        <button onclick="location.reload()">Reload</button>
        `;
      }
  }
})

$(document).ready(() => {
  loadQuiz();
});