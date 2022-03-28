    <?php
    $conn = mysqli_connect("localhost","root","","wad_modul4");
    $id = $_GET['id'];
    $book = "DELETE FROM booking WHERE id = '$id'";
    $query = mysqli_query($conn, $book);

    session_start();

    $_SESSION['message'] = "Berhasil Hapus!";

    header("location:Bookings.php");
    ?>