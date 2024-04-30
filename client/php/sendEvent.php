<?php
session_set_cookie_params(0);
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idGumba = $_POST["idGumba"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phishing";

    // Pridobi id od trenutnega poskusa
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT max(id) as id FROM poskus where zaposleni_fk like '" . $_SERVER['REMOTE_ADDR'] . "'";
    $result = $conn->query($sql);

    $idp = null;

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $idp = $row['id'];
    }
    } else {
        echo "A problem with the query!";
        return false;
    }
    $conn->close();

    // Vnesi dogodek v bazo
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO datum_klika (id_p, id_g, datum) VALUES (?, ?, STR_TO_DATE(?, '%d.%m.%Y %H:%i:%s'))");
    $stmt->bind_param("sss", $idp, $idGumba, $datum);

    $datum = date("d.m.Y H:i:s");

    $stmt->execute();

    $conn->close();
    echo "Data received and processed successfully!";
} else {
    // If the request method is not POST, send an error response
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method.";
}
?>