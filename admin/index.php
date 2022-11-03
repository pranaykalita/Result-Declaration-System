<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["aid"]))
{
    header("Location: /");
}
else
{
    header("Location: dashboard.php");
}

?>