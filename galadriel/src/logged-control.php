<?php
session_start();
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
   header("Location: ./login.php");
   exit();
}
