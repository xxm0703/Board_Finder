<?php
$conn = mysqli_connect('localhost', 'root', '', 'finder');
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    http_response_code(404);
    exit();
}
$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$fname = ucfirst($_POST['fname']);
$sname = ucfirst($_POST['sname']);
$names = "$fname $sname";
$email = $_POST['email'];
$result = mysqli_query($conn, "SELECT ID FROM users WHERE username={'$user'}");
if($result == false){
    if (mysqli_query($conn,"INSERT INTO users (username,password,names,email) VALUES ('{$user}','{$pass}','{$names}','{$email}')")){
        header('Location: events_people.php?login=true');
    }
}
mysqli_close($conn);
?>