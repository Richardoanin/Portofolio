<?php
$conn = mysqli_connect("localhost","root","","webku");

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
            $query = "INSERT INTO user VALUES ('', '$email', '$hash', '$nama', '$nomor')";
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

    $cekEmail = "SELECT * FROM user WHERE Email='$email'";
    $hasil = mysqli_query($conn, $cekEmail);

    if (mysqli_num_rows($hasil) == 1) {
        $result = mysqli_fetch_assoc($hasil);
        if (password_verify($password, $result['Password'])) {
            $_SESSION['id'] = $result['Id_user'];
            $_SESSION['nama'] = $result['Nama_user'];
            $_SESSION['email'] = $result['Email'];
            $_SESSION['nomor'] = $result['No_hp'];

            $_SESSION['message'] = 'Berhasil Login';
            header("Location:Proses.php");
            exit();
        } else {
            $_SESSION['message'] = 'Gagal Login!';
            header("Location:Login.php");
            exit();
        }
    }
}

function admin($req)
{
    global $conn;

    $email = $req['email'];
    $password = $req['password'];

    $cekEmail = "SELECT * FROM admin WHERE email='$email'";
    $hasil = mysqli_query($conn, $cekEmail);

    if (mysqli_num_rows($hasil) == 1) {
        $result = mysqli_fetch_assoc($hasil);
        if (password_verify($password, $result['password'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $result['email'];

            $_SESSION['message'] = 'Berhasil Login';
            header("Location: Haladmin.php");
            exit();
        } else {
            $_SESSION['message'] = 'Gagal Login!';
            header("Location: Admin.php");
            exit();
        }
    }
}