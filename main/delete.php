<?php
header("Location: index.php");
$self = basename(htmlspecialchars($_SERVER['PHP_SELF']));
$dir = '/var/www/html/';
try {
    echo (!empty($_POST['filename']) and !empty($self)) ? delete($_POST['filename'], $self, $dir) : 'Fehler bei der Übergabe!';
}
catch (Exception $e) {
    echo 'Exception: ',  $e->getMessage(), "\n";
}

function delete($filename, $self, $dir) {
    $filename = basename(htmlspecialchars($filename));

    if (!file_exists($dir.$filename)) throw new Exception('Datei nicht vorhanden.');
    if ($filename === $self) throw new Exception('Diese Datei kann nicht gelöscht werden!');

    else {
        unlink(realpath($dir.$filename));

        $meldung = "$filename wurde gelöscht";
        
        if (file_exists($dir.$filename)) $meldung = 'Es ist ein Fehler aufgetreten!';

        return $meldung;
    };
}
?>
