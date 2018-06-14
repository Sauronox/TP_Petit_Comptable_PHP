<?php
session_start();

setcookie('user', '', time()-3600, "/");
unset($_COOKIE['user']);

session_destroy();
header("location: login");