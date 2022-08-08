<?php

session_start();

if (isset($_SESSION['perfil']) && isset($_SESSION['id'])) {
    session_destroy();
}

header('Location: ../telas/logout.php');
exit;