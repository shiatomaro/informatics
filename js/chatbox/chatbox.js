import { commonQuestions } from "./common-questions.js";

// add event listener for the chatbox open button
document.getElementById('show-chat-btn').addEventListener('click', function () {
    toggleChatBox();
});

// add event listener for the chatbox close button
document.getElementById('close-chat-btn').addEventListener('click', function () {
    toggleChatBox();
});

// add event listener for the send message button
document.getElementById('send-btn').addEventListener('click', function () {
    sendUserMessage('user');
});

// Add event listener for "Enter" key press
document.getElementById('chat-input').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        sendUserMessage('user');
    }
});

function toggleChatBox() {
    // toggle chatbox
    var chatBox = document.getElementById('floating-chat');
    chatBox.classList.toggle('open');
    
    // hide toggle show chat button
    var showChatButton = document.getElementById('show-chat-btn');
    showChatButton.classList.toggle('hidden');
}

function displayCommonQuestions(questions) {
    var commonQuestionsContainer = document.getElementById('common-questions');
    commonQuestionsContainer.innerHTML = "";

    questions.forEach(function (item) {
        var questionElement = document.createElement('div');
        questionElement.classList.add('common-question');
        questionElement.innerText = item.question;
        questionElement.onclick = function () {
            sendCommonQuestion(item.question, item.response);
            if (item.nextQuestions.length > 0) {
                displayCommonQuestions(item.nextQuestions);
            } else {
                displayServerMessage("Is there anything else I can help you with?");
                displayCommonQuestions(commonQuestions);
            }
        };

        commonQuestionsContainer.appendChild(questionElement);
        scrollChatBox();
    });
}

function sendCommonQuestion(question, response) {
    var chatBody = document.getElementById('chat-body');
    chatBody.innerHTML += '<div class="message user-message">' + question + '</div>';
    chatBody.innerHTML += '<div class="message server-message">' + response + '</div>';
}

function sendUserMessage(sender) {
    var message = document.getElementById('chat-input').value;
    if (message.trim() !== '') {
        var chatBody = document.getElementById('chat-body');
        var messageClass = sender === 'user' ? 'user-message' : 'server-message';
        chatBody.innerHTML += '<div class="message ' + messageClass + '">' + message + '</div>';
        document.getElementById('chat-input').value = '';

        // TODO: 
        // send the message to the server using AJAX if needed
        // Example: Implement an AJAX function to send the message to your PHP script
        // and handle the server response.
    }
}

function displayServerMessage(message) {
    var chatBody = document.getElementById('chat-body');
    var messageClass = 'server-message';
    chatBody.innerHTML += '<div class="message ' + messageClass + '">' + message + '</div>';
}

function scrollChatBox() {
    var chatBody = document.getElementById('chat-body');
    var currentScrollPos = chatBody.scrollTop;
    var scrollHeight = chatBody.scrollHeight - currentScrollPos;
    var duration = 500; // Adjust the duration as needed (in milliseconds)
    var startTime = null;

    function animateScroll(timestamp) {
        if (!startTime) startTime = timestamp;

        var progress = timestamp - startTime;
        var percentage = Math.min(progress / duration, 1);

        chatBody.scrollTop = currentScrollPos + percentage * scrollHeight;

        if (progress < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    requestAnimationFrame(animateScroll);
}

displayCommonQuestions(commonQuestions);