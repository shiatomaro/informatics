<!-- chatbox container -->
<div id="floating-chat" class="closed">
    <div id="chat-header">
        Chat
        <button id="close-chat-btn">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div id="chat-body">
    </div>
    <div id="common-questions"></div>
    <div id="chat-footer">
        <input type="text" id="chat-input" placeholder="Type your message...">
        <button id="send-btn">Send</button>
    </div>
</div>

<!-- button to open/close chat -->
<button id="show-chat-btn" class="floating-btn">
    <i class="fa-solid fa-message"></i>
</button>

<script src="js/chatbox/chatbox.js" type="module"></script>