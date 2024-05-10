<?php
require 'connect.php';

// Ambil ID dari parameter GET
$id = isset($_GET['id']) ? $_GET['id'] : "";

// Persiapkan statement SQL dengan parameterized query
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $id); // "i" adalah tipe data integer

// Eksekusi statement
$stmt->execute();

// Ambil hasil kueri
$result = $stmt->get_result();

// Inisialisasi array untuk menyimpan data
$data = [];

// Loop melalui hasil kueri dan tambahkan ke array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Cek apakah data ditemukan
if (empty($data)) {
    // Data tidak ditemukan, kirim respons 404 Not Found
    http_response_code(404);
    echo json_encode(["message" => "Data not found"]);
} else {
    // Data ditemukan, kirimkan sebagai respons JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Tutup statement dan koneksi
$stmt->close();
$con->close();
?>
