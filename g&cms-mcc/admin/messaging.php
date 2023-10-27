<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Messaging</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
    /* CSS for the chat bubble */
    .chat-bubble {
        position: fixed;
        padding: 2px;
        bottom: 20px;
        right: 20px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        transition: width 0.3s, height 0.3s;
    }

    .chat-box {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #f1f1f1;
        border-radius: 5px;
        width: 300px;
        display: none;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .chat-header {
        background: #ddd;
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    #minimize-chat {
        cursor: pointer;
    }

    .chat-content {
        padding: 10px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    #user-selection,
    #chat-input,
    #send-message,
    #multiple {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    #user-selection {
        margin-bottom: 10px;
    }

    #send-message {
        background: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <!-- Chat bubble -->
    <button class="chat-bubble" id="chat-bubble">Chat</button>

    <!-- Chat box -->
    <div class="chat-box" id="chat-box">
        <div class="chat-header">
            <h3>Admin Chat</h3>
            <i class="fas fa-minus" id="minimize-chat">_</i>
        </div>
        <div class="chat-content">
            <label for="user-selection">Select a user to message:</label> <br>
            <select id="multiple" class="js-states form-control" multiplestyle="width: 100%;">

                <option value="student1">Student 1</option>
                <option value="student2">Student 2</option>
                <!-- Add more student options here -->
            </select>

            <textarea id="chat-input" placeholder="Type your message..."></textarea>
            <button id="send-message">Send</button>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
    $("#single").select2({
        placeholder: "Select Student",
        allowClear: true
    });
    $("#multiple").select2({
        placeholder: "Select Student",
        allowClear: true
    });
    </script>
    <script src="script.js"></script>
</body>

</html>