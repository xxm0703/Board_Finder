<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 6:59 PM
 */
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'finder');
if (!$conn) {
    http_response_code(400);
    exit();
}
if (!isset($_SESSION['username'])) {
    header('Location: Profile.php?login=true');
    exit();
}
$base = $_POST['addToDatabase'];
$game = $_POST['game'];
$username = $_SESSION['ID'];
$game = strtolower($game);
$game = mysqli_real_escape_string($conn, $game);
$username = mysqli_real_escape_string($conn, $username);
if (trim($game) == ''){
    http_response_code(400);
    header("Location: Profile.php");
    mysqli_close($conn);
    exit();
}
$search = mysqli_query($conn, "SELECT ID FROM games WHERE game_name = '$game'");
if (mysqli_fetch_array($search) == null) {
    mysqli_query($conn, "INSERT INTO games (game_name) VALUES ('$game')");
}
$search = mysqli_query($conn, "SELECT ID FROM games WHERE game_name = '$game'");
while ($record = mysqli_fetch_array($search)) {
    $int_search = mysqli_query($conn, "SELECT * FROM info_games WHERE userID = {$username} AND gameID = {$record[0]} AND type={$base}'");
    if(mysqli_fetch_array($int_search) == null){
        $saver =  $record[0];
        $q = mysqli_query($conn, "INSERT INTO info_games (userID,gameID, type) VALUES ({$username},{$saver},{$base})");
        if($q){
            echo "Added";
        }
    }
    header("Location: Profile.php");
    mysqli_close($conn);
    exit();
}
