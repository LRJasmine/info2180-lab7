<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = '$lab7userpassWord$';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

?>

<?php 
  if ($_SERVER['REQUEST_METHOD'] === 'GET'){
      $country = filter_input(INPUT_GET,'country',FILTER_SANITIZE_STRING);
      $city = filter_input(INPUT_GET,'context',FILTER_SANITIZE_STRING);
      
      if ($country !== ""){
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
        
        
        <table border = '2' bgcolor = "white">
        <tr>
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>

        <?php
        foreach ($results as $row):
        {
            echo "<tr>";
            echo "<td>" . $row['name'] ."</td>";
            echo "<td>" . $row['continent'] . "</td>";
            echo "<td>" . $row['independence_year'] . "</td>";
            echo "<td>" . $row['head_of_state'] . "</td>";
            echo "</tr>";
        }
        endforeach;
        ?>

        </table>
        
        <?php
      }else if ($city == 'cities'){
          
        $joinTab = $conn ->query("SELECT countries.name, cities.name, city.district,city.population FROM countries JOIN cities
        ON countries.code=cities.country_code");
        $joinResults = $joinTab ->fetchAll(PDO::FETCH_ASSOC); ?>
        
        <table border = '2' bgcolor = "white">
        <tr bgcolor = "skyblue">
            <th>Country Name</th>
            <th>City Name</th>
            <th>District</th>
            <th>Population</th>

        </tr>

        <?php
        foreach ($joinResults as $row):
        {
            echo "<tr>";
            echo "<td>" . $row['name'] ."</td>";
            echo "<td>" . $row['district'] ."</td>";
            echo "<td>" . $row['population'] ."</td>";
            echo "</tr>";
        }
        endforeach;
        ?>

        </table>
        
      <?php 
      }else{
        $stmt = $conn->query("SELECT * FROM countries");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
        
        <table border = '2' bgcolor = "white">
        <tr bgcolor = "skyblue">
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>

        <?php
        foreach ($results as $row):
        {
            echo "<tr>";
            echo "<td>" . $row['name'] ."</td>";
            echo "<td>" . $row['continent'] . "</td>";
            echo "<td>" . $row['independence_year'] . "</td>";
            echo "<td>" . $row['head_of_state'] . "</td>";
            echo "</tr>";
        }
        endforeach;
        ?>

        </table>
        
        <?php
      }
  }
?>
