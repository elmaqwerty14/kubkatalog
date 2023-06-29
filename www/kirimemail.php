<?php
    
         
                // mencari alamat email si user
                $ambil = $koneksi->query("SELECT * FROM pembeli WHERE email = '$email'");
                $data = $ambil->fetch_assoc();
                $alamatEmail = $data['email'];
                $sandi = $data['password'];
                

                $mail->SMTPDebug = 0;                      //Enable verbose debug output
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
                $mail->Subject = 'Informasi Password';
                $mail->Body    = 'Email Anda : '.$email.'. Password Anda adalah : '.$sandi. ' . Silahkan login kembali menggunakan Email dan Password anda. ';
                $mail->AltBody = 'Silahkan login kembali menggunakan Email dan Password anda.';
                //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
                //$mail->addAttachment(''); 
                 
                // mengirim email
                $kirimEmail = $mail->send();
                 
                // cek status pengiriman email
                if ($kirimEmail) {
                     
                    // if ($data) 
                    echo "<script>alert('Password telah dikirim ke email Anda!');window.location='index.php';</script>";
                }
                else echo "Message could not be sent. ";
         
                
        
    ?>
    <!-- END LOGIN PEMBELI -->