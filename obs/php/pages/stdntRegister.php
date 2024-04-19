<?php 
include("../classes/classes.php");
if(!empty($_POST)){

    $signup = new signup();

    if($signup->getinf(array($_POST['stdntName'],$_POST['stdntSurname'],$_POST['tcNmbr'],$_POST['brthDate'],$_POST['gndr'],$_POST['sctn'],$_POST['mthrName'],$_POST['fthrName'],$_POST['adress']))){
        echo "kayıt başarılı bir şekilde oluşturuldu";
    }else{
        echo "\nPDO::errorInfo():\n";
    }
}

?>    
