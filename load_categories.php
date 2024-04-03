<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Zxc100806";
$dbname = "new_schema";

$connection = mysqli_connect($servername, $username, $password, $dbname);
$connection->set_charset('utf8');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$parent_id = $_GET['parent_id'];

$sql = "SELECT * FROM categories WHERE parent_id = $parent_id";
$result = mysqli_query($connection, $sql);

$categories = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($categories);

mysqli_close($connection);
?>
