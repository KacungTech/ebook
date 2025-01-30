<html>
<head>
    <title>Books Database</title>
</head>
 
<body>
<?php

include_once("connection.php");
 
if(isset($_POST['create'])) {    
    $judulbuku = $_POST['judulbuku'];
    $coverbuku = $_POST['coverbuku'];
    $filebuku = $_POST['filebuku'];
	$hargabuku = $_POST['hargabuku'];
	$deskripsibuku = $_POST['deskripsibuku'];
        

    if(empty($judulbuku) || empty($coverbuku) || empty($filebuku) || empty($deskripsibuku)) {
                
        if(empty($judulbuku)) {
            echo "<font color='red'>Judul buku tidak boleh kosong.</font><br/>";
        }
        
        if(empty($coverbuku)) {
            echo "<font color='red'>Cover buku tidak boleh kosong.</font><br/>";
        }
		
		if(empty($filebuku)) {
            echo "<font color='red'>File buku tidak boleh kosong.</font><br/>";
        }
		
		if(empty($deskripsibuku)) {
            echo "<font color='red'>Deskripsi buku tidak boleh kosong.</font><br/>";
        }
        
        
        echo "<br/><a href='javascript:self.history.back();'>Kembali</a>";
    } else { 
        
		$insert = "INSERT INTO `books` (`id`, `judulbuku`, `coverbuku`, `filebuku`, `hargabuku`, `deskripsibuku`) 
					VALUES (NULL, :judulbuku, :coverbuku, :filebuku, :hargabuku, :deskripsibuku);";
        
        $query = $dbConnection->prepare($insert);
                
        $query->bindparam(':judulbuku', $judulbuku);
		$query->bindparam(':coverbuku', $coverbuku);
		$query->bindparam(':filebuku', $filebuku);
		$query->bindparam(':hargabuku', $hargabuku);
        $query->bindparam(':deskripsibuku', $deskripsibuku);
        $query->execute();
        
        echo "<font color='green'>Buku berhasil dibuat.";
        echo "<br/><a href='index.php'>Lihat buku</a>";
    }
}
?>
</body>
</html>