<?php
require_once 'models/pegawai.php';
// tangkap request id dari url bar

$id = $_REQUEST['id'];
$objek = new pegawai();
$ambil = $objek->getdetail($id);


// print_r($ambil); exit();

?>


<div class="card " style="width: 18rem; margin-top:20px; left:30%">
<img class="card-img-top" src="images/<?= $ambil['foto']?>" alt="<?= $ambil['foto']?>">
  <div class="card-body">
    <h5 class="card-title text-center" style="font-size: 20pt;"><?= $ambil['nama'] ?></h5>
    <p class="card-text" style="font-size: 13pt;">
        NIP: <?= $ambil['nip'] ?>
        <br>Agama: <?= $ambil['agama'] ?>
        <br>Email: <?= $ambil['email'] ?>
        
        <br>Divisi: <?= $ambil['divisi'] ?>
        
    </p>
    <a href="index.php?hal=dataPegawai" class="btn btn-primary text-center">Go back</a>
  </div>
</div>