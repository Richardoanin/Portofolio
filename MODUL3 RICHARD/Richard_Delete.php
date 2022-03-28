    <?php
    $conn = mysqli_connect("localhost","root","","modul3");
    $id_buku = $_GET['id_buku'];
    $buku = "DELETE FROM buku_table WHERE id_buku= '$id_buku'";
    $query = mysqli_query($conn, $buku);
    header("location: Richard_Home.php");
    ?>