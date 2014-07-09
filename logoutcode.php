<?php

session_start();

// unset($_SESSION['loggedin']);

session_unset();
session_destroy();

echo "<script>document.location='login-form.php'</script>";

?>