<?php
    session_start();
    require_once '../models/member.php';
    require_once '../koneksi.php';
    
   $uname= $_POST['username'];
   $pw = $_POST['password'];
    
    $data = [
        $uname,
        $pw
    ];

    
    $objek = new member();
     
    $rs = $objek->ceklogin($data);
    if(!empty($rs)){
        $_SESSION['MEMBER'] = $rs;
        header('location:http://localhost:8080/src/index.php?hal=dataPegawai');
    }else{
        header('location:http://localhost:8080/src/index.php?hal=gagallogin');
    }

?>