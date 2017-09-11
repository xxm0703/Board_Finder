<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 5:33 PM
 */
$conn = mysqli_connect('localhost', 'root','','finder');
if (!$conn){
    http_response_code(503);
    exit();
}
$events = mysqli_query($conn, "SELECT * FROM ")
?>