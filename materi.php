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

$id_topik = $_GET['id_topik'] ?? null;

if ($method === "GET") {
// Mengambil data materi
    $sql = "SELECT * FROM materis WHERE id_topik = '$id_topik'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $materi = array();
        while ($row = $result->fetch_assoc()) {
            $materi[] = $row;
        }
        echo json_encode($materi);
    } else {
        echo "Data materi kosong.";
    }
}

$conn->close();

?>