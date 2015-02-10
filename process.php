<?php

require '../config/config.php' ;

$data = array();

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $points = $_POST['points'];
    $email = $_POST['email'];

    //insert values
    $sql = "INSERT INTO playersresults (playername, points, email) VALUES ('$name', '$points', '$email')";

    $conn->exec($sql);

    //Get values
    $stmt = $conn->prepare("SELECT playername, points FROM playersresults ORDER BY points DESC LIMIT 10");
    $stmt->execute();

    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);

    //encode directly to json
    $data=json_encode($results);

}

catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

echo json_encode($data);

?>