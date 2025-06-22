<?php
require_once 'includes/conn.php';

// Ambil data buku (pastikan juga id dibutuhkan untuk detail)
$sql = "SELECT id_buku as id, judul, pengarang, stok FROM buku";
$result = $conn->query($sql);

$buku = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buku[] = $row;
    }
}

?>