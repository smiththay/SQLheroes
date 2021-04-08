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




?>