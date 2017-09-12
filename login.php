<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 11:42 AM
 */
session_start();
$conn = mysqli_connect('127.0.0.1','root', '','finder');
if (!$conn){
    http_response_code(503);
    exit();
}else{
    if (!isset($_POST['username'])) {
        header("Location: Profile.php?login=true", true, 400);
        exit();
    }
    $test = $_POST["username"];
    $log = mysqli_query($conn,"SELECT * FROM users WHERE username = \"{$test}\"");
    if ($log == false || mysqli_num_rows($log) != 1){
        header("Location: Profile.php?login=true");
        exit();
    }else {
        while ($var_dump = mysqli_fetch_array($log)) {
            if ($var_dump['password'] == $_POST['password']) {
                $_SESSION['ID'] = $var_dump['ID'];
                $_SESSION['username'] = $_POST['username'];
                $names = explode(' ',$var_dump['names']);
                $_SESSION['f_name'] = $names[0];
                $_SESSION['s_name'] = $names[1];
                $_SESSION['e-mail'] = $var_dump['email'];
                $_SESSION['image'] = $var_dump['image'];
            }
        }
        header('Location: Profile.php');
        exit();
    }
}