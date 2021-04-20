<?php
    require_once '../models/pegawai.php';
    require_once '../koneksi.php';
    
    // 1. Tangkap isi form

    // nama variabel bebas, yang wajib sama adalah yang didalam kurung siku, harus sama dengan "name" yang ada di file viewform.php
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $email  = $_POST['email'];
    $agama = $_POST['agama'];
    $divisi = $_POST['divisi'];
    
    $foto   = $_POST['foto'];
    $tombol = $_POST['proses'];
    // $tombol = $_POST['proses']; ini untuk nangkap id tombol, jadi pilihan di switch case nanti

    // 2. Simpan isi form dalam array

    // karena di function simpan($data) memerlukan argumen $data, maka buat array dengan nama $data

    $data = [
        $nip, // untuk tanda tanya ke 1
        $nama, // untuk tanda tanya ke 2
        $email, // untuk tanda tanya ke 3
        $agama, // untuk tanda tanya ke 4
        $divisi, // untuk tanda tanya ke 5
        $foto // untuk tanda tanya ke 6
    ];

    // 3. Proses data, panggil function simpan($data) dari class poduk.php
     $objek = new pegawai();
     
    switch($tombol){
        case 'simpan':
            $objek->simpan($data);
            break;
        case 'ubah' : 
            // tambah dulu id nya ke array $data yang diatas, karena array diatas tidak menampung id dari data
            $data[] = $_POST['idx']; //ini menangkap hidden field yang berisi id, lalu ditambahkan ke array $data
            $objek->ubah($data);
            break;
        case 'hapus' :
            $id = $_POST['idx'];
            $objek-> hapus($id);
            break;
        
        default: //UNtuk ketika tekan tombol batal ketika mau hapus
            header("location:http://localhost:8080/src/index.php?hal=dataPegawai");
            break;

    }

    //  Arahkan

    header('location:http://localhost:8080/src/index.php?hal=dataPegawai');
?>