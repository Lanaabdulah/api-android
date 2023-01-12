<?php 
	//Import File Koneksi Database
	require_once('config.php');
	
	//Membuat SQL Query
	$sql = "SELECT `id_unit_kerjas`, `titik_A`, `titik_B`, `titik_C`, `titik_D` FROM `lokasi_units`";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
			"unit"=>$row['id_unit_kerjas'],
            "a"=>$row['titik_A'],
            "b"=>$row['titik_B'],
            "c"=>$row['titik_C'],
            "d"=>$row['titik_D']
		));
	}
	
	//Menampilkan Array dalam Format JSON
    header('Content-Type: application/json');
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>