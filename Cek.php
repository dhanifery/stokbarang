<?php

// cek login

if (isset($_SESSION['log'])) {
    # code...
}else{
    header('location:Login.php');
}
?>