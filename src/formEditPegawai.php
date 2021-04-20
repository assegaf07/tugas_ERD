<?php
require_once 'models/pegawai.php';
$ar_agama = ['islam','hindu','budha','katolik','kristen','kong hucu'];
$obj = new pegawai();
$rs  = $obj->dataagama();
$id = $_REQUEST['id'];
$id_edit=$obj ->getdetail($id);

?>

<form method="POST" action="controller/pegawaiController.php" style="margin:20px;">
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">NIP</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nip" name="nip" type="text" required="required" class="form-control" value="<?= $id_edit['nip']?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" placeholder="Place your name here" type="text" required="required" class="form-control" value="<?= $id_edit['nama']?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" placeholder="email@whatever.com" type="text" required="required" class="form-control" value="<?= $id_edit['email']?>"  >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Agama</label> 
    <div class="col-8">

    <?php
    $no=0;
    foreach($ar_agama as $agama){

        $cek=($id_edit['agama'] == $agama ? "checked" : "")

    ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="agama" id="agama_<?= $no?>" type="radio" required="required" class="custom-control-input" value="<?= strtoupper($agama) ?> " <?=$cek?>> 
        <label for="agama_<?= $no?>" class="custom-control-label"><?= strtoupper($agama) ?></label>
      </div>
    <?php
    $no++;
    }
    ?>
     
    </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" required="required" class="custom-select">
        <option value="">--Pilih Divisi--</option>
        <?php
        foreach($rs as $ag){
            $divisi=($id_edit['iddivisi'] == $ag['id'] ? "selected" : "")
        ?>
          <option value="<?=$ag['id'] ?>" <?=$divisi ?> ><?= $ag['nama'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control" value="<?= $id_edit['foto']?>"  >
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" class="btn btn-primary" value="ubah">Submit</button>
      <input type="hidden" name="idx" value="<?=$id?>">
    </div>
  </div>
</form>