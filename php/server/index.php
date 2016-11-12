<!doctype html>
<html>
  <?php
    ini_set ("display_errors", "1");
    error_reporting(E_ALL);
    $db_connection = getConnection() or die('DB connection failed');
    $result = pg_exec($db_connection, 'select * from "impresos_area"');
    $numrows = pg_numrows($result);

    /* TODO : Use posgresql PDO to prevent sql injection
       TODO : add .ini file containing the sensitive db parameters*/
    function getConnection() {
      $host = "127.0.0.1";
      $port = "5432";
      $dbname = "impresos";
      $user = "idcconsultores";
      $password = "consultores";
      return pg_Connect("host=$host dbname=$dbname user=$user password=$password");
    }
  ?>
 <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="static/lib/bootstrap/css/bootstrap.min.css">
  <title>PHP StartProject</title>
 </head>
 <body>

  <h2 class="text-center"> Areas </h2>
  <div class="panel panel-default">
    <div class="panel-heading"><?php echo "$numrows areas found" ?></div>
    <table class="table">
    <tr> <th>ID</th> <th>Name</th> <th>Description</th> </tr>

    <?php
     //Display area result set.
     for($ri = 0; $ri < $numrows; $ri++) {
        echo "<tr>";
        $row = pg_fetch_array($result, $ri);
        echo " <td>", $row["id"], "</td>
        <td>", $row["name"], "</td>","<td>",
        ($row["description"])?$row["description"]:"Sin descripcion disponible",
        "</td></tr>";
     }
     pg_close($db_connection);
    ?>
  </table>
  </div>

      <footer class="footer jumbotron text-center">
        <span>© Copyright</span> 
      </footer>
      <!-- JQuery & Bootstrap js -->
      <script type="text/javascript" src="static/lib/jquery/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="static/lib/bootstrap/bootstrap.min.js"></script>
 </body>
</html>