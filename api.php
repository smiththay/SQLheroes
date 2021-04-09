<?php

$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "SQLheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$route = $_GET['route'];


switch ($route) {
  case "getAllHeroes":
    $myData = getAllHeroes($conn);
    break;
  case "getHeroByID":
    $id = $_GET["hero_id"];
    $myData = getHeroByID($conn, $id);
    break;
  case "createHero":
    $myData = createHero($conn);
    break;
  case "deleteHero":
    $myData = deleteHero($conn);
    break;
  case "updateHero":
    $myData = updateHero($conn);
    break;
  default:
    $myData = json_encode([]);
    
}

echo $myData;

$conn->close();


function getALLHeroes($conn){
  $data = array();
  
$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($data, $row);
       //$data .= "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["about_me"] . "<br>";
      }
    }

  return  json_encode($data);
  
  
}

function getHeroByID ($conn, $heroID){
  
  $data = array();
  
$sql = "SELECT * FROM heroes WHERE id = " . $heroID;
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($data,$row);
       // $data .= "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["about_me"] . "<br>";
      }
    } 

  return json_encode($data);
  
}

function createHero ($conn){

$sql = "INSERT INTO heroes (id, name, about_me, biography, image_url)
VALUES ('7', 'Repairman', 'repairs stuff thats broke', 'hates his job', 'null')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

function deleteHero ($conn){
  
$sql = "DELETE FROM heroes WHERE id=7";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
}

function updateHero ($conn){
  
      $sql = "UPDATE heroes SET name='Unemployed man' WHERE id=7";

    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

mysqli_close($conn);
  
  
}
  





?>