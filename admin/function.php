<?php

$conn = mysqli_connect("localhost", "root", "", "healthify");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    $row = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }

    return $rows;

}

function tambah($data) {
    global $conn;

    $judul = ($data["judul"]);
    $isi_artikel = ($data["isi_artikel"]);
    $sub_judul = ($data["sub_judul"]);
    $sub_desk = ($data["sub_desk"]);
   

    // upload khusus gambar
    $image = upload();

    if (!$image) {
        return false;
    }

    // QUERY INSERT DATA TO DATABASE
    $query = "INSERT INTO artikel
                VALUES
                ('$id_artikel', '$image', '$judul', '$isi_artikel', '$sub_judul', '$sub_desk')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// ===FUNCTION UPLOAD===
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

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
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

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

    move_uploaded_file ($tmpName, 'img-penyakit/' . $namaFileBaru);

    return $namaFileBaru;
}

?>

