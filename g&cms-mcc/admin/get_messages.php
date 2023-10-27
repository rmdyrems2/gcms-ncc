<?php
require_once('db_connection.php'); // Include your database connection code

$query  = "SELECT sender, message, timestamp FROM messages ORDER BY timestamp DESC LIMIT 50";
$result = $conn->query($query);

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = [
        'sender'    => $row['sender'],
        'message'   => $row['message'],
        'timestamp' => $row['timestamp'],
    ];
}

echo json_encode($messages);