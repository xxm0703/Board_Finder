<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 5:24 PM
 */
//echo '<h1>HI</h1>';
session_start();
session_destroy();
header("Location: events_people.php");
?>

