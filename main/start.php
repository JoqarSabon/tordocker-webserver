<?php
header("Location: index.php");
shell_exec('sudo chown root:root /var/lib/tor/hidden_service/hostname && ' .
'sudo chown root:root /var/lib/tor/hidden_service/ && ' .
'sudo supervisorctl start tor &&' .
'sudo chown www-data:www-data /var/lib/tor/hidden_service/hostname &&' . 
'sudo chown www-data:www-data /var/lib/tor/hidden_service/');
?>
