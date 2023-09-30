<?php
session_start();
session_destroy();
header("Location: /forum/index.php?logoutsuccess=true");
?>