<?php

session_start();
var $game_names = [];
$conn = mysqli_connect('localhost', 'root', '', 'users');
if (!$conn) {
    http_response_code(400);
    exit();
} else {
    $ID = $_SESSION['ID'];
    $log = mysqli_query($conn, "SELECT gameID FROM interes_games WHERE userID='$ID'");
    while ($gameid = mysqli_fetch_array($log)) {
        $game = mysqli_query($conn, "SELECT game_name FROM games WHERE ID='$gameid'");
        while ($gamename = mysqli_fetch_array($game)){
            
        }
    }
}
?>