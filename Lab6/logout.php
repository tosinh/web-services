<?php

session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["fullname"]);
unset($_SESSION["score"]);
unset($_SESSION["valid"]);

header('Refresh: 2; URL = index.php');
