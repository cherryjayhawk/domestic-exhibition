<?php
session_start();
session_destroy();
echo '<script>window.location="homepage-user.php"</script>';
?>