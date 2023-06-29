
<?php
                if (isset($_POST["bayar_sekarang"])) {
                    $id_pembeli = $_SESSION["pembeli"]["id_pembeli"];
                    // $id_kurir = $_POST["id_kurir"];
                    $tgl_pembelian = date("Y-m-d H:i:s");
                    $alamat_pengiriman = $_SESSION["pembeli"]["alamat"];

                    // $ambil = $koneksi->query("SELECT * FROM kurir WHERE id_kurir = '$id_kurir'");
                    // $arraykurir = $ambil->fetch_assoc();
                    // $jenis_kurir = $arraykurir['jenis_kurir'];

                    $finaltotalbelanjasemua = $finaltotalbelanja;

                    // 1. menyimpan data ke tabel pembelian 
                    $koneksi->query("INSERT INTO pembelian (id_pembeli,tgl_pembelian,finaltotalbelanjasemua,ekspedisi,alamat_pengiriman,ongkir,provinsi,distrik,kodepos,tipe,paket,estimasi) VALUES ('$id_pembeli','$tgl_pembelian','$finaltotalbelanjasemua','$ekspedisi','$ongkir','$provinsi','$distrik','$kodepos','$tipe','$paket','$estimasi','$alamat_pengiriman')");

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