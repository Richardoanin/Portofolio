<?php
$conn = mysqli_connect("localhost","root","","wad_modul4");

function register($req)
{
    global $conn;

    $nama = $req['nama'];
    $email = $req['email'];
    $nomor = $req['nomor'];
    $password = $req['password'];
    $confirm = $req['confirm'];

    $cekEmail = "SELECT email FROM user WHERE email='$email'";
    $hasil = mysqli_query($conn, $cekEmail);

    if (mysqli_num_rows($hasil)<1) {
        if ($password == $confirm) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user VALUES ('', '$nama', '$email', '$hash', '$nomor')";
            mysqli_query($conn, $query);

            $_SESSION['registered'] = 'Berhasil registrasi';
            header("Location: Login.php");
            exit();
        }else {
            $_SESSION['message'] = 'Password Salah!';
            header("Location: register.php");
            exit();
        }
    }
    $_SESSION['message'] = 'Email sudah terdaftar!';
    header("Location: register.php");
    exit();
}

function login($req)
{
    global $conn;

    $email = $req['email'];
    $password = $req['password'];

    $cekEmail = "SELECT * FROM user WHERE email='$email'";
    $hasil = mysqli_query($conn, $cekEmail);

    if (mysqli_num_rows($hasil) == 1) {
        $result = mysqli_fetch_assoc($hasil);
        if (password_verify($password, $result['password'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['nama'] = $result['nama'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['nomor'] = $result['nomor'];

            $_SESSION['message'] = 'Berhasil Login';
            if (isset($req['remember'])) {
                setcookie('email', $email, strtotime('+7 days'), '/');
                setcookie('password', $password, strtotime('+7 days'), '/');
            }
            header("Location:Index.php");
            exit();
        } else {
            $_SESSION['message'] = 'Gagal Login!';
            header("Location:Login.php");
            exit();
        }
    }
}

function booking($req)
{
    global $conn;

    $nama = $req['tempat'];
    $lokasi = $req['lokasi'];
    $tanggal = $req['tanggal'];
    $harga = $req['harga'];
    $id = $_SESSION['id'];

    $query = "INSERT INTO booking VALUES ('', '$id', '$nama', '$lokasi', '$harga', '$tanggal')";
            mysqli_query($conn, $query);

    $_SESSION['message'] = 'Berhasil Booking';
    header("Location: Index.php");
    exit();
}
?>