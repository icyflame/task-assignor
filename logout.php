<?php

session_start();

unset($_SESSION['loggedin']);

echo "<script>document.location='login-form.php'</script>";



?>