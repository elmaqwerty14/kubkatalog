<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_SSL_VERIFYHOST => 2, 
    CURLOPT_SSL_VERIFYPEER => 2,
    CURLOPT_HTTPHEADER => array(
        "key: bc9ffe0cd076eaba25faf4259e3f6e85"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // Konversi JSON ke Array
    $array_response = json_decode($response, true);
    $data_provinsi = $array_response["rajaongkir"]["results"];

    echo "<option>---Pilih Provinsi---</option>";
    foreach ($data_provinsi as $key => $tiap_provinsi) {
        echo "<option value='" . $tiap_provinsi["province_id"] . "' id_provinsi='" . $tiap_provinsi["province_id"] . "'>";
        echo $tiap_provinsi["province"];
        echo "</option>";
    }
}
