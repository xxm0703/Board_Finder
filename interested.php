<?php
/*
 *
 *
 * */
session_start();
$game_names = array();
$conn = mysqli_connect('localhost', 'root', '', 'finder');
if (!$conn) {
    http_response_code(400);
    exit();
}
if (!isset($_SESSION['ID'])) {
    header("Location: Profile.php#", true, 400);
    exit();
}
$base = $_GET['base'];
$ID = $_SESSION['ID'];
$log = mysqli_query($conn, "SELECT gameID FROM {$base} WHERE userID='{$ID}'");
if ($log != null) {
    while ($gameid = mysqli_fetch_array($log)) {
        $temp = $gameid[0];
        $game = mysqli_query($conn, "SELECT game_name FROM games WHERE ID='{$temp}'");
        while ($gamename = mysqli_fetch_array($game)) {
            array_push($game_names, ucfirst($gamename[0]));
        }
    }
}
echo json_encode($game_names);
exit();
?>