<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUB MERCI</title>
    <link rel="shortcut icon" href="logonew.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/styleindex.css" rel="stylesheet">
    <link href="css/checkout.css" rel="stylesheet">
</head>

<style>
    /* NAVBAR */
    .navbar-nav li {
        padding: 0 2px;
        color: #fff;
    }

    #navbarNav ul li div.isi a {
        color: #FFF;
        border-bottom: 2px solid transparent;
        border-top: 2px solid transparent;
    }

    #navbarNav ul li div.isi a:hover {
        border-bottom: 2px solid #DE831D;
    }


    /* NAVBAR DROPDOWN */
    .dropdown-menu {
        display: none;
    }

    .navbar-nav li:hover>div.dropdown-menu {
        display: block;
        color: #000;
        font-size: 14px;
    }

    .dropdown-menu a:hover {
        color: #DE831D;
        font-weight: bold;
    }
</style>

<body>
<form action="" method="POST" class="mb-4">

    <div class="form-group row align-middle">
        <div class="col-md-1">
            <label><b>Provinsi</b></label>
        </div>
        <div class="col-md-5">
            <select class="form-control" name="nama_provinsi" required>
                    <option>---Pilih Provinsi Anda---</option>
                                
            </select>
        </div>

        <div class="col-md-1">
            <label><b>Distrik</b></label>
        </div>
        <div class="col-md-5">
            <select class="form-control" name="nama_distrik" required>
                <option>---Pilih Distrik Anda---</option>
                                
                                
            </select>
        </div>


        <input type="text" name="provinsi" >
        <input type="text" name="distrik" >
        <input type="text" name="tipe" >
        <input type="text" name="kodepos" >
        <input type="text" name="idd" >

        <div class="col-md-2">
            <button class="btn btn-sm btn-dark" name="bayar_sekarang"><i class="fa-solid fa-dollar-sign"></i>&nbsp;Bayar Sekarang</button>
        </div>


        <?php
                if (isset($_POST["bayar_sekarang"])) {
                    
                    $provinsi = $_POST["provinsi"];
                    $distrik = $_POST["distrik"];
                    $tipe = $_POST["tipe"];
                    $kodepos = $_POST["kodepos"];
                    $idd = $_POST["idd"];
                   
                    // 1. menyimpan data ke tabel pembelian 
                    $koneksi->query("INSERT INTO coba (provinsi,distrik,tipe,kodepos,idd) VALUES ('$provinsi','$distrik','$tipe','$kodepos','$idd')");

                    // tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
                    echo "<script>alert('Pembelian Sukses');</script>";
                    
                }
                ?>
 </form>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script>


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