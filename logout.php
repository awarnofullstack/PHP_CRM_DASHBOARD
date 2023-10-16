<?php
session_start();
ob_start();

unset($_SESSION['active']);

header('location: login.php');

  ob_end_flush();
            