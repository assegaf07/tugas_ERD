<?php
class pegawai{
    private $koneksi;
    // buat constructor
    public function __construct(){
        // global ini akan mengglobalkan variabel $dbh yang ada di file teskoneksi.php
        global $dbh; 
        // lalu isi daru $dbh akan dijadikan isi dari variabel private $koneksi dengan kode dibawah.
        $this->koneksi = $dbh;
    } 
    public function datapegawai(){
        // buat query untuk mysql untuk join data dan menampilkan data yang baru ditambah paling atas.
        $sql = "SELECT pegawai.*, divisi.nama as divisi from pegawai inner join divisi on pegawai.iddivisi = divisi.id order by pegawai.id DESC";
        // method prepare statement (menyiapkan pengambilan data)
        // buat variabel ps untuk memanggil variabel koneksi, lalu panggil fungsi PDO PREPARE untuk menyiapkan  query di $sql
        $ps = $this->koneksi->prepare($sql);
        // eksekusi perintah
        $ps->execute();
        // tampilkan data yang telah di eksekusi
        $rs = $ps->fetchAll();
        return $rs;
    }  

    public function dataagama(){
        $sql = "SELECT * from divisi";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data){
        
        $sql = "INSERT into pegawai(nip,nama,email,agama,iddivisi,foto) values (?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        
        $ps->execute($data);

    }

    public function getdetail($id){
        
        $sql = "SELECT pegawai.*, divisi.nama as divisi from divisi inner join pegawai on pegawai.iddivisi = divisi.id where pegawai.id =?";
        
        $ps = $this->koneksi->prepare($sql);
        
        $ps->execute([$id]);
        
        $rs = $ps->fetch();
        return $rs;
    }

    public function ubah($data){
        
        $sql = "UPDATE pegawai set nip=?,nama=?,email=?,agama=?,iddivisi=?,foto=? where id=?";
        $ps = $this->koneksi->prepare($sql);
        
        $ps->execute($data);

    }

    public function hapus($id){
        $sql = "DELETE From pegawai where pegawai.id = ?";
        $ps = $this->koneksi->prepare($sql);
        
        $ps->execute([$id]);
    }

   
}