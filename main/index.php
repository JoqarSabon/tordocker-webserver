<html>
  <head>
    <title>Tor-Webserver</title>
    <link rel="stylesheet" href="./style/stylesheet.css">
    <link rel="icon" type="image/png" href="/pictures/onion.png">
  </head>
  <body>
    <header id= "header">
      <!--<script>setTimeout(function(){ window.location.reload();}, 5000);-->
      </script>
      <img src="./pictures/onion-logo.png" alt="Kein Bild" id="firsti">
      <h1 id="firsth">Tor-Webserver</h1>
    </header>
    <nav id= "navigation">
      <p class="normaln">Path: /var/www/html/</p>
      <iframe id="my_iframe" style="display:none;"></iframe>
      <table id="table">
      <?php
              $dir = '/var/www/html';
              $files = scandir($dir);
              sort($files);
              $count = -1 ;
              foreach ($files as $filename) {
                  if ($filename != '.' && $filename != '..') {
                      $str_URL = $dir . $filename;
                      echo "<tr>";
                      echo "<td>";
                      echo $count;
                      echo "</td>";
                      echo "<td>";
                      echo $filename;
                      echo "</td>";
                      echo "<td>";
                      echo "<form action='delete.php' method='post'>
                        <input type='text' value='$filename' name='filename' id='$filename' style='display:none;'/>
                        <input type='submit' value='Delete' name='delete' id='dbutton'/>
                        </form>";
                      echo "</td>";
                      echo "</tr>";
                  }
                  $count++;
              }
          ?>
      </table>
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file" id="nbutton1" />
      <input type="submit" value="Upload" id="nbutton2" />
      </form>
    </nav>
    <aside id= "aside">
    <p class="mainh">Welcome Admin User</p>
    </br>
    <p class="normalm" id="content"></p>
    <script>
     function updateOnlineStatus(){
       let content = document.getElementById("content");
       let textContent = `Internet connection status: ${navigator.onLine ? "Online" : "Offline"} `;
       content.textContent = textContent;
     }
     document.addEventListener("DOMContentLoaded", function () {
       updateOnlineStatus();
       window.addEventListener('online',  updateOnlineStatus);
       window.addEventListener('offline', updateOnlineStatus);
     });
    </script>
    <?php
    $file = "/var/lib/tor/hidden_service/hostname";
    $document = file_get_contents($file);
    echo"<p class='normalm'>Domain:<a href='http://$document'>$document</p></a>"
    ?>
    <p class="normalm">Security note: Pay close attention to cybersecurity and protect your systems & Server</p>
    <?php
      if(isset($_GET['action']))
     ?>
     <form action="start.php" onlick='document.getElementById("demo").innerHTML = "Onlne"' method="post">
       <input type="submit" value="Start Server" id="mbutton1">
     </form>
     <form action="stop.php" method="post">
       <input type="submit" value="Stop Server" id="mbutton2">
    </form>
    </aside>
  </body>
</html>
