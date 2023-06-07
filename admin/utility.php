<?php

// koneksi database seperti biasa
// inisiasi $conn untuk memudahkan pemanggilan koneksi, "localhost", "username", "pass", "namadatabase"
include "../dokter/config.php";

// function query untuk mengambil data
function query ($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $row = [];

    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// buat function add data
function tambah($data) {
    global $conn;

    // buat variable image dengan memanggil name dari input file html
    $image = upload();  // setiap function berjalan maka variable image akan mengambil data dari function upload

    // jika yang diupload bukan gambar / image
    if (!$image) {
        return false;
    }

    // insert query
    
    
        $cek = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'") or die(mysqli_error($koneksi));

        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO penyakit (id_penyakit, nama, deskripsi, gejala, penyebab, pengobatan, gambar) VALUES ('$id_penyakit', '$nama', '$deskripsi', '$gejala', '$penyebab', '$pengobatan', '$gambar')") or die(mysqli_error($koneksi));

            if ($sql) {     
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_penyakit";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
        }
    }
        

function upload() {
    // inisiasi variable dengan mengambil array menggunakan variable global $FILES
    // komponen yang perlu diambil ada 4: nama file, ukuran file, error, tmpName
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // var_dump($namaFile);     nyalakan jika ingin melihat isi dari array
    // var_dump($ukuranFile);
    // var_dump($error);
    // var_dump($tmpName);

    // cek ada gambar yang diupload atau tidak
    // jika tidak ada maka jalankan 
    
    if ($error === 4) 
    {
        echo  "<script>
                    alert('Pilih gambar terlebih dahulu');
                </script>
            ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];      // ekstensi gambar yang bisa diupload, bisa di rubah sesuai kebutuhan
    $ekstensiGambar = explode('.', $namaFile);          // membagi string menjadi beberapa bagian 'namafile' '.' 'ekstensi;
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // mengubah otomatis setiap ekstensi yang masuk menjadi string lowercase

    // cek apakah yang diupload termasuk bagian dari ekstensi yang valid atau tidak
    // jika tidak ada maka yg diupload bukan gambar
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo  "<script>
                    alert('yang anda upload bukan gambar!');
               </script>
        ";
        return false;
    }

    // cek jika ukuran file terlalu besar
    if ( $ukuranFile > 1000000) {
        echo  "<script>
                    alert('ukuran gambar terlalu besar');
               </script>
        ";
        return false;
    }

    // jika lolos pengecekan, gambar siap upload
    // kemudian generate nama gambar baru

    // inisiasi untuk generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // yang diambil ke database hannya teks / string, sedangkan 'move_uploadaed_file' berguna untuk mengambil file yang diupload kemudian menyimpannya ke dalam direktory tujuan kita
    move_uploaded_file ($tmpName, 'vendor/img/penyakit/' . $namaFileBaru); // function ini berhubungan dengan atribut di form enctype

    return $namaFileBaru;
}

?>  