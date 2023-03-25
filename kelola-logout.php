<?php
session_start();
session_destroy();
echo '<script>window.location="kelola-login.php"</script>';
?>