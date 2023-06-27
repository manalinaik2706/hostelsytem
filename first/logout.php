<?php

include 'common.php';

session_start();
session_destroy();
redirect('/first/login.html', $statusCode = 303);