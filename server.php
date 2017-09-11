<?php
$dbconn = mysqli_connect('127.0.0.1','root', '', 'Finder');

if ($dbconn) {
    print "HI";
    $result = mysqli_query($dbconn,'SELECT * FROM users');
    while ($var_dump = mysqli_fetch_array($result)) {
        echo $var_dump;
    }
} else {
    print "Connection to database failed!\n";
}
mysqli_close($dbconn);
?>