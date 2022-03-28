<?php
$conn = mysqli_connect("localhost","root","","webku");
$id_pesan = $_GET['id'];
$pesan = "DELETE FROM pesan WHERE Id= '$id_pesan'";
$query = mysqli_query($conn, $pesan);
header("location: Haladmin.php");
?>