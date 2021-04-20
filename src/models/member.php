<?php
class member{
    private $koneksi;
    // buat constructor
    public function __construct(){
        // global ini akan mengglobalkan variabel $dbh yang ada di file teskoneksi.php
        global $dbh; 
        // lalu isi daru $dbh akan dijadikan isi dari variabel private $koneksi dengan kode dibawah.
        $this->koneksi = $dbh;
    } 

    public function ceklogin($data){
        
        $sql = "SELECT * from member where username= ? AND password = SHA1(MD5(?))";
        
        $ps = $this->koneksi->prepare($sql);
        
        $ps->execute($data);
        
        $rs = $ps->fetch();
        return $rs;
    }

   
   
}