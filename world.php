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
      if ($country !== ""){
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<ul>';
        foreach ($results as $row){
          echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
          echo '</ul>';
        }
      else{
        $stmt = $conn->query("SELECT * FROM countries");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
        <ul>
        <?php foreach ($results as $row): ?>
        <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
        <?php endforeach; ?>
        </ul>
        <?php
      }
  }
?>