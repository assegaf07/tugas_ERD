<?php
require_once 'models/pegawai.php';

// Buat objek dari class produk
$objek = new pegawai();
// panggil method tampilkan data dalam file produk.php
$rs = $objek->datapegawai();



?>
<?php

if (isset($member)){  
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php
}
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Agama</th>
      <th scope="col">Divisi</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
      
    </tr>

  </thead>
  <tbody>
  <?php
  $no = 1;
  foreach($rs as $prod){  
  ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $prod['nip']; ?></td>
      <td><?= $prod['nama']; ?></td>
      <td><?= $prod['email']; ?></td>
      <td><?= $prod['agama']; ?></td>
      <td><?= $prod['divisi']; ?></td>
      <td><?= $prod['foto']; ?></td>
      <td>
        <!-- TAMBAHKAN TAG FORM KARENA TOMBOL HAPUS MEMAKAI ATTRIBUT "Button" yang mana harus mengirimkan data melalui method POST form -->
        <form action="controller/pegawaiController.php" method="POST">
        <a href="index.php?hal=detailPegawai&id=<?=$prod['id'] ?>" class="btn btn-primary">detail</a>
        <?php
          $role = $member['role'];

          if (isset($member)){  
        ?> 
        <a href="index.php?hal=formEditPegawai&id=<?=$prod['id'] ?>" class="btn btn-warning">Edit</a>

        <?php
          
          // untuk otorisasi tombol hapus selain role "staff"
          if($role != 'staff' ){
        ?>  
        <button name="proses" value="hapus" class="btn btn-danger"
        onclick="return confirm('Hapus data?')"
        >Hapus</button>
            <?php
            }
            ?>
        <?php
          }
        ?>
        <!-- Tambahkan juga input hidden untuk menangkap id dari data -->
        <input type="hidden" name='idx' value="<?=$prod['id']?>" >
        </form>
        </td>
     
    </tr>
  <?php 
  $no++;
  }
  ?>  
  </tbody>
</table>