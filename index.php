<?php
    try{
        $databaseBaglantisi = new PDO("mysql:host=localhost;dbname=project2;charset=UTF8", "root", "");
    }

    catch(PDOException $hata){
        echo $hata -> getMessage();
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $reklamSorgusu = $databaseBaglantisi -> prepare("SELECT * FROM banners ORDER BY gosterimSayisi ASC LIMIT 1");
    $reklamSorgusu -> execute();
    $reklamSayisi = $reklamSorgusu->rowCount();
    $reklamKaydi = $reklamSorgusu -> fetch(PDO::FETCH_ASSOC);
    ?>



    <table width="1000" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="250">
            <td align="center"><img src="Banners/<?php echo $reklamKaydi["bannerDosyasi"]; ?>" border="0"></td>
        </tr>
    </table>
</body>
</html>

<?php
    $reklamGuncelle = $databaseBaglantisi -> prepare("UPDATE banners SET gosterimSayisi = gosterimSayisi + 1 WHERE id= ? LIMIT 1");
    $reklamGuncelle->execute([$reklamKaydi["id"]]);

    $databaseBaglantisi = null;
?>