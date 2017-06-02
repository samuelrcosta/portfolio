<?php
session_start();
$_SESSION['id'] = -1;
$_SESSION['permissao'] = -1;
$_SESSION['retorno'] = 0;
header("Location:login");