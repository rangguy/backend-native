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

if ($method === "GET") {
// Mengambil data kategori
    $sql = "SELECT * FROM kategori";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $kategori = array();
        while ($row = $result->fetch_assoc()) {
            $kategori[] = $row;
        }
        echo json_encode($kategori);
    } else {
        echo "Data kategori kosong.";
    }
}

$conn->close();

?>