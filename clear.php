<?php
session_start();

unset($_SESSION['tinycart']);

header('location:index.php');