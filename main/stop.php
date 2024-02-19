<?php
header("Location: index.php");
shell_exec("sudo supervisorctl stop tor");
?>
