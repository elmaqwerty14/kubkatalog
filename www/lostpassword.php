<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUB MERCI</title>
    <link rel="shortcut icon" href="logonew.jpeg">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(bguser1.jpeg);
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        width: 100%;
        height: 100vh;
        background-repeat: no-repeat;
    }

    .form-box {
        width: 320px;
        height: 210px;
        background: #ffffffb8;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        padding: 40px 0;
        color: black;
        box-shadow: 0 1rem 9rem rgb(249 169 23 / 32%) !important;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 35px;
    }

    .input-box {
        margin: 31px auto;
        width: 80%;
        border-bottom: 1px solid #000;
        padding-top: 8px;
        padding-bottom: 3px;
    }

    .input-box input {
        width: 80%;
        border: none;
        outline: none;
        background: transparent;
        color: #000;
        height: 20px;
        font-size: 14px;
    }

    .fa {
        margin-right: 10px;
    }

    .eye {
        position: absolute;
        cursor: pointer;
    }

    #hide1 {
        display: none;
    }

    .login-btn {
        margin: 40px auto 20px;
        width: 80%;
        display: block;
        outline: none;
        padding: 10px 0;
        border: 1px solid #000;
        cursor: pointer;
        background: transparent;
        color: #000;
        font-size: 16px;
    }

    .form-box button[type="submit"]:hover {
        border: 1px solid transparent;
        background: rgba(0, 0, 0, .7);
        color: #fff;
        transition: all 0.3s ease;
    }

    .form-box a {
        text-decoration: none;
        font-size: 12px;
        margin-left: 2px;
        margin-right: 2px;
        color: #000;
    }

    .form-box a:hover {
        color: #3F8EF9;
    }

    /* ::placeholder {
        color: #000;
    } */
</style>

<body>

    <!-- LOGIN PEMBELI -->
    <div class="form-box">
        <h1>Lupa Password</h1>
        <form action="" method="POST">
            <div class="input-box">
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Masukan Email" autofocus="" required="" autocomplete="off">
            </div>
            <!-- <div class="input-box">
                <i class="fa fa-key"></i>
                <input type="password" id="myInput" class="form-control" name="password" placeholder="Masukan Password" autofocus="" required="" autocomplete="off">
                <span class="eye" onclick="lihatPassword()">
                    <i id="hide1" class="fa-regular fa-eye"></i>
                    <i id="hide2" class="fa-regular fa-eye-slash"></i>
                </span>
            </div> -->
            <button type="submit" class="login-btn" name="lupa">SUBMIT</button>
            <center style="font-size: 12px;">Belum punya akun?<a href="daftar_pembeli.php" class="animated zoomIn" style="animation-delay: 1.9s;">Signup Now</a></center>
        </form>
    </div>


    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //ini sesuaikan foldernya ke file 3 ini
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    // jika ada tombol login (tombol login ditekan)
    if (isset($_POST["lupa"])) {
        $email = $_POST['email'];
 
        function randomPassword()
        {
        // function untuk membuat password random 6 digit karakter
         
        $digit = 6;
        $karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
         
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = "";
        while ($i <= $digit-1)
        {
        $num = rand() % 32;
        $tmp = substr($karakter,$num,1);
        $pass = $pass.$tmp;
        $i++;
        }
        return $pass;
        }
         
        // membuat password baru secara random -> memanggil function randomPassword
        $newPassword = randomPassword();
         
        // perlu dibuat sebarang pengacak
        $pengacak  = "NDJS3289JSKS190JISJI";
             
        // mengenkripsi password dengan md5() dan pengacak
        $newPasswordEnkrip = md5($pengacak . md5($newPassword) . $pengacak);
         
        // mencari alamat email si user
        $ambil = $koneksi->query("SELECT * FROM pembeli WHERE email = '$email'");
        $data = $ambil->fetch_assoc();
        $alamatEmail = $data['email'];
        $sandi = $data['password'];
        

        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'elmakiu333@gmail.com';                     //SMTP username
        $mail->Password   = 'tbcecwitvssnnrvj';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //pengirim
        $mail->setFrom('elmakiu333@gmail.com', 'kubmerci.com');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = 'Email Anda : '.$email.'. Password Anda adalah '.$sandi;
        $mail->AltBody = '';
        //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
        //$mail->addAttachment(''); 
         
        // mengirim email
        $kirimEmail = $mail->send();
         
        // cek status pengiriman email
        if ($kirimEmail) {
         
            // $ubah = $koneksi->query("UPDATE pembeli SET password = '$newPasswordEnkrip' WHERE email = '$email'");
            // update password baru ke database (jika pengiriman email sukses)
            // $query = "UPDATE pembeli SET password = '$newPasswordEnkrip' WHERE email = '$email'";
            // mysqli_query($koneksi, $query);
            // $data = $ubah;
             
            // if ($data) 
            echo "<script>alert('Password telah dikirim ke email Anda!');window.location='index.php';</script>";
            }
        else echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 
    }
    ?>
    <!-- END LOGIN PEMBELI -->



    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>
    <script>
        function lihatPassword() {
            var x = document.getElementById("myInput"),
                y = document.getElementById("hide1"),
                z = document.getElementById("hide2");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>

</html>