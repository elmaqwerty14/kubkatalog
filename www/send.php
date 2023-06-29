<!-- <?php 


                  if (isset($_POST['submit'])){

                  $nama_cs = $_POST['nama_cs'];
                  $no_telp = $_POST['no_telp'];
                  $isi_pesan = $_POST['isi_pesan'];

                    $koneksi->query ("INSERT INTO pesan_cs (nama_cs,no_telp,isi_pesan) VALUES ('$_POST[nama_cs]','$_POST[no_telp]','$_POST[isi_pesan]')");

                    

                  header("location:https://api.whatsapp.com/send?phone=$no_telp&text=Nama:%20$nama_cs%20%0D&Pesan:%20$isi_pesan");
                  }else{
                  	echo "
                  		<script>
                  			window.location=history.go(-1);
                  			</script>                  	
                  			";
                  }

 ?> -->

 Route::get('/', function(){

 	return view('index');
 });

 Route::post('/submit',function(){

 	$nama_cs=$_POST['nama_cs'];
 });