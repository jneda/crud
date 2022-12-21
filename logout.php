<?php

session_start();
unset($_SESSION['user']);

header('Location: /list.php?status=logout-success');