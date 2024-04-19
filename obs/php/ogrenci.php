<?php 

include("conn.php");


$ogrenciID = 3; 


$sql = "SELECT Dersler.DersAdi, Ogrenci_Ders_Iliskisi.Notu, Ogrenci_Ders_Iliskisi.DonemYil
        FROM Ogrenci_Ders_Iliskisi
        INNER JOIN Dersler ON Ogrenci_Ders_Iliskisi.DersID = Dersler.DersID
        WHERE Ogrenci_Ders_Iliskisi.OgrenciID = $ogrenciID";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "Ders Adı: " . $row["DersAdi"]. " - Notu: " . $row["Notu"]. " - Dönem/Yıl: " . $row["DonemYil"]. "<br>";
    }
} else {
    echo "Öğrencinin notu bulunamadı.";
}