<?php 

class database { 

    protected $MYSQL_HOST = 'localhost';
    protected $MYSQL_USER = 'root';
    protected $MYSQL_PASS = '';
    protected $MYSQL_DB = 'ogrenciobs';
    protected $pdo = null ;
    protected $stmt = null ;


    protected function connectDb(){
        $SQLSTR="mysql:host=".$this->MYSQL_HOST.";dbname=".$this->MYSQL_DB.";";
        try {
            $this->pdo = new PDO($SQLSTR,$this->MYSQL_USER,$this->MYSQL_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // verileri obje olarak çek 


        } catch (PDOException $e) {
            die("Veri Tabanı baglantısı Oluşturulamadı".$e->getMessage());
        }
    }

    function __construct()
    {
        $this->ConnectDB();
    }



    function getrow($query,$params){
        //tek satır için 
        try {
            if(is_null($params)){
                $this->stmt = $this->pdo->query($query);
            }else{
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt->fetch();
        } catch (\Throwable $th) {
         //echo $this->stmt->errorInfo();
        }
    }


    function getrows($query,$params){
        //satırlar için  
        try {
            if(is_null($params)){
                $this->stmt = $this->pdo->query($query);
            }else{
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt->fetchAll();
        } catch (\Throwable $th) {
           // print_r($this->stmt->errorInfo());
        }
    }


    function getcol($query,$params=null){
        //tek sütun için 
        try {
            if(is_null($params)){
                $this->stmt = $this->pdo->query($query);
            }else{
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt->fetchColumn();
        } catch (\Throwable $th) {
            print_r($this->stmt->errorInfo());
        }
    }


    function __destruct()
    {
        $this->pdo = NULL;
    }
    


}


class signup extends database{

    function getinf($params = null){
        try {
            $this->stmt = $this->pdo->prepare("insert into ogrenci (Isim,Soyisim,tcNum,DogumTarihi,Cinsiyet,BolumID,AnneAdi,BabaAdi,Adres) values (?,?,?,?,?,?,?,?,?)");
            $this->stmt->execute($params);
            return $this->stmt;
        } catch (PDOException $e) {
            error_log("kayıt olusturulamadı".$e->getMessage());
			print_r($this->stmt->errorInfo());
        }
    }
}


class gradeoperations extends database {

    private $database;

    public function __construct() {
        $this->database = new Database();
    }


    public $ogrenciID;
    public $DersID;
	public $snvTuru ;
    public $notu;
    public $db ;
    public $sonuc ;  




    public function setCredentials($ogrenciID, $DersID, $snvTuru, $notu) {

        $this->ogrenciID = $ogrenciID;
        $this->DersID = $DersID;
        $this->snvTuru = $snvTuru;
        $this->notu = $notu;
        //$this->checkGrade();
        
    }

    function checkGrade(){

        $checkgrade =$this->database->getrows("SELECT * FROM ogrenci_ders_notlari WHERE OgrenciID = ? AND DersID = ?",array($this->ogrenciID,$this->DersID));
        
        if($checkgrade){
            // "ogrencinin notu var UPDATE" 

            $updategrade = $this->database->getrow("UPDATE ogrenci_ders_notlari SET $this->snvTuru = ? WHERE OgrenciID = ? AND DersID = ?",array($this->notu,$this->ogrenciID,$this->DersID));
            print_r($updategrade);
            if($updategrade){
                // "not güncellenmedi";
                $this->sonuc = false;
            }else{
                // "not güncellendi" ;
                $this->sonuc = true;
            }
            
            
        }else{
            // "ogrencinin notu yok INSERT ";

            $addgrade = $this->database->getrow("INSERT INTO ogrenci_Ders_Notlari (OgrenciID, DersID, $this->snvTuru) VALUES (?, ?, ?)",array($this->ogrenciID,$this->DersID,$this->snvTuru));
            print_r($addgrade);
            if($addgrade){
                // "not eklenemedi";
                $this->sonuc = false;
            }else{
                // "not eklendi" ;
                $this->sonuc = true;
            }
            
        }
        return $this->sonuc;
    }





}



