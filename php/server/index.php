<!doctype html>
<html>
  <?php
    require_once 'api/MyAPI.class.php';
    ini_set ("display_errors", "1");
    error_reporting(E_ALL);
  ?>
 <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="static/lib/bootstrap/css/bootstrap.min.css">
  <title>Impresos articulos</title>
 </head>
 <body>
  <h2 class="text-center"> Areas </h2>
  <div class="panel panel-default">
    <table class="table" id="areas-table">
    <tr> <th>ID</th> <th>Name</th> <th>Description</th> </tr>
  </table>
  </div>

      <footer class="footer jumbotron text-center">
        <span>© Copyright</span> 
      </footer>
      <!-- JQuery & Bootstrap js -->
      <script type="text/javascript" src="static/lib/jquery/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="static/lib/bootstrap/js/bootstrap.min.js"></script>
      <script>
            $(function() {
                request = $.ajax({
                    url: "/api/areas",
                    type: "get",
                });
                request.done(function (response, textStatus, jqXHR){
                    console.log(response);
                    var areas = JSON.parse(response); 
                    var areas_table_html = '';
                      areas.forEach(function(area) {
                        areas_table_html += "<tr>";
                        areas_table_html += " <td>" + area["id"] + "</td> <td>";
                        areas_table_html += area["name"] + "</td> <td>";
                        areas_table_html += ((area["description"])?area["description"]:"Sin descripcion disponible");
                        areas_table_html += "</td></tr>";
                    });
                    $("#areas-table").append(areas_table_html);
                });
                request.fail(function (jqXHR, textStatus, errorThrown){
                    console.error("Internal error encountered: "+textStatus, errorThrown);
                });
            });
      </script>
 </body>
</html>
