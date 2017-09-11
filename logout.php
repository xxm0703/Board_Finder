<?php
/**
 * Created by IntelliJ IDEA.
 * User: martin
 * Date: 9/11/2017
 * Time: 5:24 PM
 */
    session_start();
    session_unset();
    session_destroy();
    header("Location: Profile.php#?login=true");
?>