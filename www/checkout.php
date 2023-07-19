<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';

// jika belum ada session pembeli(belum login), maka dibawah ke login.php
if (!isset($_SESSION["pembeli"])) {
    echo "<script>alert('Anda Belum Login');</script>";
    echo "<script>location='login_pembeli.php';</script>";
}
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Belanja Terlebih Dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

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
    <?php include 'navbar.php'; ?>

    <!-- BREADCRUMB -->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #FFF;" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
    <!-- END BREADCRUMB -->



    <!-- DESKRIPSI MENU -->
    <div class="container" hidden>
        <div class="row row-checkout">
            <div class="col-12">
                <h4><b>Deskripsi Checkout</b></h4>
                <div class="garis-checkout"></div>
                <form action="" method="POST" class="mb-4">
                    <div class="form-group row align-middle">
                        <div class="col-md-1">
                            <label><b>Pembeli</b></label>
                        </div>
                        <div class="col-md-2">
                             <input type="text" style="font-size: 13px; cursor: no-drop;" readonly value="<?php echo ($_SESSION["pembeli"]['nama'])?>" class="form-control">
                        </div>

                        <div class="col-md-2">
                           <label><b>No. Telepon</b></label>
                        </div>
                        <div class="col-md-2">
                           <input type="text" style="font-size: 13px; cursor: no-drop;" readonly value="<?php echo ($_SESSION["pembeli"]['telepon'])?>" class="form-control">
                        </div>

                        <div class="col-md-2">
                           <label><b>Alamat Lengkap Pengiriman</b></label>
                        </div>
                        <div class="col-md-3">
                            <textarea class="form-control" style="font-size: 13px; cursor: no-drop;" name="alamat" readonly><?php echo ($_SESSION["pembeli"]['alamat'])?></textarea>
                        </div>
                    </div>

                    

                    <!-- <div class="col-md-2">
                        <button class="btn btn-sm btn-dark" name="bayar_sekarang"><i class="fa-solid fa-dollar-sign"></i>&nbsp;Bayar Sekarang</button>
                    </div>
 -->
                </form>

                

            </div>
        </div>
    </div>
    <!-- END DESKRIPSI MENU -->


     <!-- DESKRIPSI MENU -->
    <div class="container">
        <div class="row row-checkout">
            <div class="col-12">
                <h4><b>Deskripsi Ongkos Kirim</b></h4>
                <div class="garis-checkout"></div>
                <form action="" method="POST" class="mb-4">

                    <?php $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
                            $pecah = $ambil->fetch_assoc();
                            $berat_nya = $pecah["berat_produk"];
                            // $subharga = $pecah["harga_menu"] * $jumlah;

                            // echo "<pre>";
                            // print_r($pecah);
                            // echo "</pre>";
                    ?>
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

                        <!-- <div class="col-md-1">
                            <label><b>Kurir</b></label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="nama_ekspedisi" required>
                                
                                
                            </select>
                        </div> -->

                        
                    </div><br><br>
                    <div class="form-group row align-middle">
                        <div class="col-md-1">
                            <label><b>Kurir</b></label>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="nama_ekspedisi" required>
                                
                                
                            </select>
                        </div>

                        <div class="col-md-1">
                            <label><b>Paket</b></label>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="nama_paket" required>
                                <option>---Pilih Paket Anda---</option>
                                
                            </select>
                        </div>
                    </div>

                    <?php $total_berat += $berat_nya; ?>
                    <input type="text" name="total_berat" value="<?php echo ($total_berat); ?>" hidden>
                    <input type="text" name="provinsi" hidden>
                    <input type="text" name="distrik" hidden>
                    <input type="text" name="tipe" hidden>
                    <input type="text" name="kodepos" hidden>
                    <input type="text" name="ekspedisi" hidden>
                    <input type="text" name="paket" hidden>
                    <!-- <input type="text" name="ongkir" id="ongkir" hidden> -->
                    <input type="text" name="estimasi" hidden>

                    

                   
                </form>

                

            </div>
        </div>
    </div>
    <!-- END DESKRIPSI MENU -->



    <!-- KERANJANG -->
    <div class="container">
        <div class="judul-kedai pt-4" style="background-color: #FFF; padding: 5px 10px;">
            <h5 class="daftar text-center" style="margin-top: 5px; margin-bottom: -5px; font-weight: bold;">CHECKOUT</h5>
        </div>
        <div class="row row-keranjang">
            <div class="col table-responsive mt-3 mx-3">
                <table class="table align-middle text-center table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" class="th-header">Gambar</th>
                            <th scope="col" class="th-header">Produk</th>
                            <th scope="col" class="th-header">Harga</th>
                            <th scope="col" class="th-header">Jumlah</th>
                            <th scope="col" class="th-header">Subtotal</th>                        </tr>
                    </thead>
                    <tbody class="table-group-divider align-middle">
                        <?php $totalbelanja = 0; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah) : ?>
                            <?php $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah["harga_menu"] * $jumlah;

                            // echo "<pre>";
                            // print_r($pecah);
                            // echo "</pre>";
                            ?>
                            <tr>
                                <td><img src="menu_kedai/<?php echo $pecah["foto_menu"]; ?>" class="img-keranjang" alt=""></td>
                                <td><?php echo $pecah["nama_menu"]; ?></td>
                                <td>Rp. <?php echo number_format($pecah["harga_menu"]); ?></td>
                                <td><?php echo $jumlah; ?></td>
                                <td>Rp. <?php echo number_format($subharga); ?></td>
                            </tr>
                            <?php 
                                $totalbelanja += $subharga; 
                                // $finaltotalbelanja = $totalbelanja + val (ongkir);
                            ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row row-keranjang">
            <div class="col table-responsive">
            <input  
            type="hidden"
            name="total_belanja" value="<?php echo strval($totalbelanja); ?>" />
                <table class="table ms-auto text-center mb-5 mt-3 mx-3" id="table-checkout">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" colspan="2" class="th-header">Total Keranjang Belanja</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- <input name="ongkos" id="ongkos" name="ongkos" style="color: #DE831D; border-color: transparent; font-size: 14px; content: center;" readonly class="form-control" hidden><tr>  -->
                        
                        
                        <?php $finaltotalbelanja = $totalbelanja + $ongkir; ?>
                      
                       
                        <tr>
                            <th scope="row" class="fw-bold th-header">Ongkos Kirim</th>
                            <td class="th-header fw-bold" name="ongkir" id="ongkir"><tr>
                            <th scope="row" class="fw-bold th-header">Total Harga Produk</th>
                            <td class="th-header fw-bold" name="totalbelanja" id="totalbelanja">Rp. <?php echo ($totalbelanja); ?><tr>  
                            <th scope="row" class="fw-bold th-header">Total Pembayaran</th>
                            <td class="th-header fw-bold" id="finaltotalbelanja" style="color: #DE831D;"></td><tr>
                            <!-- <th class="align-middle"><a href="checkout.php" class="btn btn-sm btn-dark"><i class="fa-solid fa-circle-check"></i>&nbsp;Bayar Sekarang</a></th> -->
                        </tr>
                        <!-- <tr>
                            <td colspan="2" class="th-header">
                                <div class="btn-checkout d-grid mx-4">
                                    <a href="prosesco.php" class="btn btn-sm btn-dark"><i class="fa-solid fa-circle-check"></i>&nbsp;Bayar Sekarang</a>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <!-- END KERANJANG -->


    <!-- DESKRIPSI MENU -->
    <div class="container" >
        <div class="row row-checkout">
            <div class="col-12">
                <h4><b>Deskripsi Checkout</b></h4>
                <div class="garis-checkout"></div>
                <form action="" method="POST" class="mb-4">
                    <div class="form-group row align-middle">
                        <div class="col-md-2">
                            <label><b>Pembeli</b></label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" style="font-size: 13px; cursor: no-drop;" readonly value="<?php echo ($_SESSION["pembeli"]['nama'])?>" class="form-control">
                        </div>

                        <div class="col-md-2">
                           <label><b>No. Telepon</b></label>
                        </div>
                        <div class="col-md-4">
                           <input type="text" style="font-size: 13px; cursor: no-drop;" readonly value="<?php echo ($_SESSION["pembeli"]['telepon'])?>" class="form-control">
                        </div>

                       
                    </div>

                    <div class="form-group row align-middle mt-4">
                        <div class="col-md-2">
                           <label><b>Alamat Lengkap Pengiriman</b></label>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" style="font-size: 13px; cursor: no-drop;" name="alamat" readonly><?php echo ($_SESSION["pembeli"]['alamat'])?></textarea>
                        </div>
                    </div>  
                    <?php $total_berat += $berat_nya; ?>
                    <input type="text" name="total_berat" value="<?php echo ($total_berat); ?>" hidden>
                    <input type="text" name="provinsi" hidden>
                    <input type="text" name="distrik" hidden>
                    <input type="text" name="tipe" hidden>
                    <input type="text" name="kodepos" hidden>
                    <input type="text" name="ekspedisi" hidden>
                    <input type="text" name="paket" hidden>
                    <!-- <input type="text" name="ongkir" id="ongkir" hidden> -->
                    <input type="text" name="estimasi" hidden>

                    <?php 
                        $totalbelanja += $subharga; 
                    ?>

                    <input  
                    type="hidden"
                    name="total_belanja" value="<?php echo strval($totalbelanja); ?>" />
                    
                     <?php $finaltotalbelanja = $totalbelanja + $ongkir; ?>


                    <input type="text" name="ongkirbeli" hidden>
                    
                    <input type="text" name="finaltotalbelanjabeli" hidden><tr>


                    <div class="col-md-2">
                        <button class="btn btn-sm btn-dark" name="bayar_sekarang"><i class="fa-solid fa-dollar-sign"></i>&nbsp;Bayar Sekarang</button>
                    </div>
                </form>

                
            <?php
                if (isset($_POST["bayar_sekarang"])) {
                    $id_pembeli = $_SESSION["pembeli"]["id_pembeli"];
                    $tgl_pembelian = date("Y-m-d H:i:s");
                    $alamat_pengiriman = $_SESSION["pembeli"]["alamat"];
                    $total_berat = $_POST["total_berat"];
                    $provinsi = $_POST["provinsi"];
                    $distrik = $_POST["distrik"];
                    $tipe = $_POST["tipe"];
                    $kodepos = $_POST["kodepos"];
                    $ekspedisi = $_POST["ekspedisi"];
                    $paket = $_POST["paket"];
                    $ongkir = $_POST["ongkirbeli"];
                    $estimasi = $_POST["estimasi"];
                    $finaltotalbelanjabeli = $_POST["finaltotalbelanjabeli"];

                    // 1. menyimpan data ke tabel pembelian 
                    $koneksi->query("INSERT INTO pembelian (id_pembeli,tgl_pembelian,alamat_pengiriman,total_berat,provinsi,distrik,tipe,kodepos,ekspedisi,paket,ongkir,estimasi,finaltotalbelanjabeli) VALUES ('$id_pembeli','$tgl_pembelian','$alamat_pengiriman','$total_berat','$provinsi','$distrik','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi','$finaltotalbelanjabeli')");

                    // mendapatkan id_pembelian yang barusan terjadi
                    $id_pembelian_barusan = $koneksi->insert_id;
                    foreach ($_SESSION["keranjang"] as $id_menu => $jumlah) {

                        // mendapatkan data menu berdasarkan id_menu
                        $ambil = $koneksi->query("SELECT * FROM menu JOIN kedai ON menu.id_kedai=kedai.id_kedai WHERE id_menu = '$id_menu'");
                        $permenu = $ambil->fetch_assoc();

                        $id_kedai = $permenu['id_kedai'];
                        $nama = $permenu['nama_menu'];
                        $harga = $permenu['harga_menu'];

                        $subharga = $permenu['harga_menu'] * $jumlah;

                        $koneksi->query("INSERT INTO pembelian_menu (id_pembelian,id_menu,id_kedai,jumlah,nama,harga,subharga) VALUES ('$id_pembelian_barusan','$id_menu','$id_kedai','$jumlah','$nama','$harga','$subharga')");


                        // skript update stok
                        $koneksi->query("UPDATE menu SET stok_menu = stok_menu - $jumlah WHERE id_menu = 
                                '$id_menu'");
                    }

                    // mengkosongkan keranjang belanja
                    unset($_SESSION["keranjang"]);

                    // tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
                    echo "<script>alert('Pembelian Sukses');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                }
                ?>

            </div>
        </div>
    </div>
    


    <?php include 'footer.php'; ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script>

    <script>
        // const id_pembeli = (document.getElementById('id_pembeli')).value

        // const response = await fetch(`${window.location.origin}kubkatalog/get-provinsi-by-idpembeli.php?akunpem=${id_pembeli}`);

        // const jsonData = await response.json() || 0;

        // const provinsipilih = document.getElementById('provinsi')

        // provinsipilih.value = jsonData
      

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
                // alert(prov);
                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dist);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
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

    <script type="text/javascript">
    function generateongkir(ongkir) {
    
    const ongkos = (document.getElementById('ongkir')).value;

    $("input[name=ongkos]").val(ongkos);

    // if (ongkir.value != 0) {
    //   document.querySelector("#ongkos").value = ongkos;
      
    // } else {
    //   document.querySelector("#ongkos").value = "";
    // }
  };

  </script> 
</body>

</html>