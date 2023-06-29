<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';

if (!isset($_SESSION["pembeli"])) {
    echo "<script>alert('Anda Belum Login');</script>";
    echo "<script>location='login_pembeli.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Pembeli</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(coy.jpg);
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        width: 100%;
        height: 100vh;
        background-repeat: no-repeat;
    }

    .form-box {
        width: 500px;
        height: 600px;
        background: #ffffffb8;
        top: 50%;
        left: 50%;
        border-radius: 20px;
        position: absolute;
        transform: translate(-50%, -50%);
        padding: 40px 0;
        color: black;
        box-shadow: 0 1rem 9rem rgb(249 169 23 / 32%) !important;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 30px;
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

    .input-box select {
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
        border-radius: 10px;
        cursor: pointer;
        background: #6BA5F2;
        color: #000;
        font-size: 16px;
    }

    .batal-btn {
        margin: 40px auto 20px;
        margin-top: 20px;
        width: 80%;
        display: block;
        outline: none;
        padding: 10px 0;
        border-radius: 10px;
        cursor: pointer;
        background: #777B7E;
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

    <!-- DAFTAR PEMBELI -->
    <div class="form-box">
        <h1>Edit Data <b class="pembeli" style="color: #DE831D;"><?php echo $_SESSION["pembeli"]["nama"] ?></b></h1>
        <!-- <?php
            $dataLaporan = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli =id_pembeli");

            $laporan = $dataLaporan->fetch_assoc();
        ?> -->
         <?php
        $ambil = $koneksi->query("SELECT * FROM pembeli 
        WHERE id_pembeli='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>
        <form action="" method="POST">
            <div class="input-box">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama']; ?>" autofocus="" required>
            </div>
            
            <div class="input-box">
                <i class="fa fa-phone"></i>
                <input type="text" class="form-control" name="telepon" value="<?php echo $detail['telepon']; ?>" autofocus="" required>
            </div>
            <div class="input-box">
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control" name="email" value="<?php echo $detail['email']; ?>" autofocus="" required>
            </div>

            <div class="input-box">
                 <i class="fa fa-map"></i>
                 <select class="form-control" name="nama_provinsi" value="<?php echo $detail['provinsi']; ?>" required>
                    <option>---Pilih Provinsi Anda / Wajib Isi---</option>
                                
                </select>
            </div>

            <div class="input-box">
                <i class="fa fa-city"></i>
                <select class="form-control" name="nama_distrik" value="<?php echo $detail['distrik']; ?>" required>
                    <option>---Pilih Dstrik Anda / Wajib Isi---</option>
                 </select>
            </div>

            <div class="input-box">
                <i class="fa fa-location-dot"></i>
                <input type="text" class="form-control" name="alamat" value="<?php echo $detail['alamat']; ?>" autofocus="" required>
            </div>

            <div class="input-box">
                <i class="fa fa-key"></i>
                <input type="text" id="myInput" class="form-control" name="password" value="<?php echo $detail['password']; ?>" autofocus="" required="" autocomplete="off">
                <span class="eye" onclick="lihatPassword()">
                    <i id="hide1" class="fa-regular fa-eye"></i>
                    <i id="hide2" class="fa-regular fa-eye-slash"></i>
                </span>
            </div>

            <input type="text" name="provinsi" hidden>
            <input type="text" name="distrik" hidden>
            <input type="text" name="tipe" hidden>
            <input type="text" name="kodepos" hidden>
            <input type="text" name="idd" hidden>

            <button type="submit" class="login-btn bg-info" name="editpembeli">Edit</button>
            <!-- <button type="submit" class="batal-btn" onclick="lanjutBelanja()">Batal</button> -->
            <center><a href="index.php" class="batal-btn" style="font-size: 16px">Batal</a></center>
        </form>
    </div>


    <?php
    if (isset($_POST["editpembeli"])) {
        $id_pembeli = $_SESSION["pembeli"]["id_pembeli"];
        // mengambil isian nama, email, password, telepon, alamat
        $nama = $_POST["nama"];
        $telepon = $_POST["telepon"];
        $email = $_POST["email"];
        $provinsi = $_POST["nama_provinsi"];
        $distrik = $_POST["nama_distrik"];
        $tipe = $_POST["tipe"];
        $kodepos = $_POST["kodepos"];
        $idd = $_POST["idd"];
        $alamat = $_POST["alamat"];
        $password = $_POST["password"];

       
        // $sql = "UPDATE pembeli SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',telepon = '$_POST[telepon]',email = '$_POST[email]', password = '$_POST[password]' WHERE id_pembeli = '$id_pembeli'";
        $koneksi->query("UPDATE pembeli SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',telepon = '$_POST[telepon]',email = '$_POST[email]', password = '$_POST[password]', provinsi = '$_POST[provinsi]', distrik = '$_POST[distrik]', tipe = '$_POST[tipe]', kodepos = '$_POST[kodepos]', idd = '$_POST[idd]' WHERE id_pembeli = '$id_pembeli'");

            echo "<script>alert('Edit data berhasil');</script>";
            echo "<script>location='index.php';</script>";

        // $koneksi->query("UPDATE pembeli SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',telepon = '$_POST[telepon]',email = '$_POST[email]', password = '$_POST[password]' WHERE id_pembeli = '$ id_pembeli'");
        }
    ?>
    <!-- END DAFTAR PEMBELI -->



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>
    <script>
        function lihatPassword() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

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

    <script>

        $(document).ready(function(){
            $.ajax({
                type: 'post',
                url: 'dataProvinsi.php',
                success:function(hasil_provinsi)
                {
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });

            $("select[name=nama_provinsi]").on("change",function(){
                var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
                $.ajax({
                    type: 'post',
                    url: 'dataKota.php',
                    data: 'id_provinsi='+id_provinsi_terpilih,
                    success:function(hasil_distrik)
                    {
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                });
            });

            $.ajax({
                type: 'post',
                url: 'dataEkspedisi.php',
                success:function(hasil_ekspedisi)
                {
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });

            $("select[name=nama_ekspedisi]").on("change",function(){
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                var distrik_terpilih = $("option:selected","select[name=nama_distrik]").attr("id_distrik");
                var total_berat = $("input[name=total_berat]").val();
                $.ajax({
                    type:'post',
                    url: 'dataPaket.php',
                    data: 'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
                    success:function(hasil_paket)
                    {
                        $("select[name=nama_paket]").html(hasil_paket);
                        // console.log(hasil_paket);
                        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    }

                })
            });

            $("select[name=nama_distrik]").on("change",function(){
                var prov = $("option:selected",this).attr("nama_provinsi");
                var dist = $("option:selected",this).attr("nama_distrik");
                var tipe = $("option:selected",this).attr("tipe_distrik");
                var kodepos = $("option:selected",this).attr("kodepos");

                var id_distrik = $("option:selected",this).attr("id_distrik");
                // alert(prov);
                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dist);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
                $("input[name=idd]").val(id_distrik);
            });

            $("select[name=nama_paket]").on("change",function(){
                var paket = $("option:selected",this).attr("paket");
                var ongkir = $("option:selected",this).attr("ongkir");
                var etd = $("option:selected",this).attr("etd");
                var total_belanja = $("input[name=total_belanja]").val()
                $("input[name=paket]").val(paket);
                // $("input[name=ongkir]").val(ongkir);
                $("input[name=ongkirbeli]").val(ongkir);
                $("#ongkir").html(`Rp. ${parseInt(ongkir)}`);
                $("input[name=estimasi]").val(etd);
                $("input[name=finaltotalbelanjabeli]").val(`${parseInt(total_belanja)+ parseInt(ongkir)}`);
                $("#finaltotalbelanja").html(`Rp. ${parseInt(total_belanja)+ parseInt(ongkir)}`);
            });

            // async function get_ipk() {
            //     const ongkir = (document.getElementById('ongkir')).value
            //     const finaltotalbelanja = (ongkir + $total_belanja);
            // }

        });
    </script>
</body>

</html>