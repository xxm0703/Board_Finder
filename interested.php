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
} else {
    if (!isset($_SESSION['ID'])){
        header("Location: Profile.php#",true,400);
        exit();
    }else{
        $ID = $_SESSION['ID'];
        $log = mysqli_query($conn, "SELECT gameID FROM interes_games WHERE userID='$ID'");
        while ($gameid = mysqli_fetch_array($log)) {
            $game = mysqli_query($conn, "SELECT game_name FROM games WHERE ID='$gameid'");
            while ($gamename = mysqli_fetch_array($game)) {
                array_push($game_names, $gamename);
            }
        }
    }
//    echo $game_names;
    exit();
}
?>