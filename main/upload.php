<?php  
  header("Location: index.php");
  $filename = $_FILES['file']['name'];
  $location = "../../../../var/www/html/".$filename;

  if (move_uploaded_file($_FILES['file']['tmp_name'], $location)){
    echo '<p>File uploaded</p>';
  }
  else {
    echo '<p>Failed</p>';
  }

?>

