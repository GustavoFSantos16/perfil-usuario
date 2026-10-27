<?php
session_status();
session_destroy();


header("Location: 15d_login.php");

exit();
?>