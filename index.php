<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
    <table>
    <h1>My Pokedex</h1>
    <?php 
         $link = mysqli_connect("localhost", "root", "", "pokedex");
         $reqq = "SELECT count(*) FROM pokemon;";
         $result = mysqli_query($link,$reqq);
         if($result){
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         echo "<p>There are {$row["count(*)"]} pokemons from the database.</p>";
         }
        }?>

    <table>
      <thead>
        <tr>
          <th>Sprite</th>
          <th>ID</th>
          <th>Name</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Base exp</th>
        </tr>
      </thead>
    <?php 
      $link = mysqli_connect("localhost", "root", "", "pokedex");
      $req = "SELECT * FROM pokemon;";
      $result = mysqli_query($link,$req);
      echo "<tbody>";
            
      if($result){
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            /*if($row["base_experience"]>=200){
              ?>         
              <style>
                  td{
                  color: red;
                  }
              </style>
            <?php
            }
            else{
            ?>
            <style>
            td{
            color: black;
            }
            </style><?php
            }*/
            echo "<tr>";
              echo "<td><img src=sprites/{$row["identifier"]}.png alt={$row["identifier"]}></td>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["identifier"] . "</td>";
              echo "<td>" . $row["height"] . "</td>";
              echo "<td>" . $row["weight"] . "</td>";
              echo "<td>" . $row["base_experience"] . "</td>";
              echo "</tr>";
      }
      mysqli_free_result($result);
      echo "</tbody>";
      
    }
    mysqli_close($link);   
      
      
      
      ?>
      </table>
  </body>
</html>
