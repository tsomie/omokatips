<?php
// Assuming you have a database connection
$host = "sql201.infinityfree.com";
$username = "if0_35597843";
$password = "fQb8WV0avcIx";
$database = "betting_tips";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = $_POST["phone_number"];
    $transaction_id = $_POST["transaction_id"];

    $sql = "SELECT tip_content FROM tips WHERE phone_number = '$phone_number' AND transaction_id = '$transaction_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Bought Tips:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Tip Content</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["tip_content"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No tips found for the given details.</p>";
    }
}

$conn->close();
?>
