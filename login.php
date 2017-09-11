<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 11:42 AM
 */
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

$conn = mysqli_connect('127.0.0.1','root', '','finder');
if (!$conn){
    http_response_code(404);
    die(mysqli_connect_error());
}else{
    $log = mysqli_query($conn,'SELECT password FROM users WHERE username == $_GET['username']');
    while ($var_dump = mysqli_fetch_array($log)){
        if ($var_dump['password'] == $_GET['password']){
            http_response_code(200);
            Redirect('localhost:63342/BoardFinder/Events%20&%20People.html');
        }
    }
}