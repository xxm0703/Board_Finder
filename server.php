<?php
$dbconn = mysqli_connect('127.0.0.1', 'root', '', 'Finder');
mysqli_set_charset($dbconn, 'utf8');
if (!$dbconn) {
    http_response_code(404);
    die(mysqli_error());
} else {
    print "HI";
    $result = mysqli_query($dbconn, 'SELECT * FROM users');
    while ($var_dump = mysqli_fetch_array($result)) {
        echo $var_dump[2];
    }
}
mysqli_close($dbconn);
?>