<?php
session_start();
session_unset();
session_destroy();

echo "Logged out successfully.". '</a><br>'. '</a><br>';

echo "Click <a href='theaterLogin.html'>here</a> to login.";
?>