<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bangkode";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$method = $_SERVER["REQUEST_METHOD"];

$id_kategori = $_GET['id_kategori'] ?? null;

if ($method === "GET") {
// Mengambil data topik
    $sql = "SELECT * FROM topik WHERE id_kategori = $id_kategori";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $topik = array();
        while ($row = $result->fetch_assoc()) {
            $topik[] = $row;
        }
        echo json_encode($topik);
    } else {
        echo "Data topik kosong.";
    }
}

$conn->close();

?>