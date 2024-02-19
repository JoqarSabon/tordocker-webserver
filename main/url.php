<?php
  $file = "/var/lib/tor/hidden_service/hostname";
  $document = file_get_contents($file);
  //uncomment for publishing
  //echo shell_exec("../Downloads/tor-browser_en/Browser/start-tor-browser --detach $document");
  echo shell_exec("../../tor-browser_de/Browser/start-tor-browser --detach $document");
  header("Location: index.php");
 ?>
