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
    $log = mysqli_query($conn,'SELECT password FROM users WHERE username == $_GET["username"]');
    if (!$log){
        echo '<h1>bcdhsdbc</h1>';
        header('http://localhost/events_people.html', true, 400);
        mysqli_close($conn);
        die(http_response_code(400));
    }else {
        while ($var_dump = mysqli_fetch_array($log)) {
            if ($var_dump['password'] == $_POST['password']) {
                header('Location: http://localhost/events_people.html',
                    true,
                    202);
                mysqli_close($conn);
            }
        }
    }
}