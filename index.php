<?php

require_once "vendor/autoload.php";
use App\ChatHandler;

$chat = new ChatHandler("chat.csv");

if (isset($_POST['send']))
{
    $chat->writeData($_POST['Username'], $_POST['Message']);
    header("Refresh: 0");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Basic Chat</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 id="title">Bacis Chat Application<h2>
        </div>

        <hr>

        <div class="row main-block">
            <div class="col-md-6">
                <h2 id="send-msg">Send Message</h2>
                <form method="post">
                    <label for="Username">Username:</label><br>
                    <input style="width: 50%" class="form-control" type="text" id="Username" name="Username" placeholder="Enter username"><br>

                    <label for="Message">Message:</label><br>
                    <textarea class="form-control" id="Message" name="Message" rows="4" placeholder="Enter message"></textarea><br>

                    <button type="submit" name="send" class="btn btn-primary">Send</button>
                </form>
            </div>

            <div id="chat-box" class="overflow-auto col-md-6">
                <?php
                foreach ($chat->getCsvReader()->getRecords() as $chatRecords) {
                    echo "<p class='chat-username'>{$chatRecords['Username']}:</p>";
                    echo "<p class='chat-msg'>{$chatRecords['Message']}</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

