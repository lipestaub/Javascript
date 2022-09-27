<?php

session_start();

if (isset($_SESSION['perfil']) && isset($_SESSION['id'])) {
    session_destroy();
}

echo "<script>window.location.href = '../index.php';</script>";