<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 11:42 AM
 */

$conn = mysqli_connect('127.0.0.1','root', '','finder');
if (!$conn){
    http_response_code(503);
    die("asd");
}else{
    $log = mysqli_query($conn,'SELECT password FROM users WHERE username == $_POST["username"]');
    if (!$log){
        http_response_code(400);
        header("Location: Profile.php#");
        exit();
    }else {
        while ($var_dump = mysqli_fetch_array($log)) {
            if ($var_dump['password'] == $_POST['password']) {
                http_response_code(200);
                header('Location: Profile.php#',
                    true,
                    202);
                exit();
            }
        }
    }
}