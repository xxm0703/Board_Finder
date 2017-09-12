<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/12/2017
 * Time: 10:14 PM
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
$photo = $_POST['image'];
$ID = $_SESSION['ID'];
if (trim($photo) == ''){
    http_response_code(400);
    header("Location: Profile.php");
    mysqli_close($conn);
    exit();
}
$sql = "UPDATE users SET image = '{$photo}' WHERE ID = {$ID}";
if (mysqli_query($conn, $sql)){
    echo "Success";
}else{
    echo "Error";
}
$_SESSION['image'] = $photo;
header("Location: Profile.php");
exit();
