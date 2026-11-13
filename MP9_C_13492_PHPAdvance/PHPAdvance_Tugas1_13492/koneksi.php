<?php
$conn = mysqli_connect('localhost', 'root', '', 'mp9');

if (!$conn) {
    die('Koneksi gagal: ' . mysql_connect_error());
}
?>