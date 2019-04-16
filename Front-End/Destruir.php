<?php
session_start();
session_destroy();
unset($_SESSION['login']);
unset($_SESSION['senha']);
header('location: index.php');


?>