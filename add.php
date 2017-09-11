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
    header('Profile.php?login=true');
    exit();
}
$game = $_POST['game'];
$username = $_SESSION['ID'];
$search = mysqli_query($conn, "SELECT ID FROM games WHERE game_name=\"{$game}\"");
if ($search == false) {
    mysqli_query($conn,"INSERT INTO games (game_name) VALUES (\"$game\")");
    header("Location: Profile.php#", true, 400);
    exit();
}
while ($record = mysqli_fetch_array($search)) {
    $sql = "INSERT INTO interes_games (userID, gameID) VALUES (\"$username\", \"$record\")";
    if (mysqli_query($conn, $sql)) {
        echo "Added";
    }
    header("Location: Profile.php");
    mysqli_close($conn);
}