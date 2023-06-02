<?php

// Koneksi ke database
function connectDB()
{
    $host = 'localhost'; // Ganti dengan host database Anda
    $user = 'root'; // Ganti dengan username database Anda
    $pass = ''; // Ganti dengan password database Anda
    $db = 'mahasiswa'; // Ganti dengan nama database Anda

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    return $conn;
}

// Mendapatkan semua data mahasiswa
function getAllMahasiswa()
{
    $conn = connectDB();

    $sql = "SELECT * FROM mahasiswa";
    $result = mysqli_query($conn, $sql);
    $mahasiswaList = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);

    return $mahasiswaList;
}

// Menambahkan data mahasiswa
function addMahasiswa($nim, $nama, $jurusan)
{
    $conn = connectDB();

    $nim = mysqli_real_escape_string($conn, $nim);
    $nama = mysqli_real_escape_string($conn, $nama);
    $jurusan = mysqli_real_escape_string($conn, $jurusan);

    $sql = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim', '$nama', '$jurusan')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

// Mendapatkan data mahasiswa berdasarkan ID
function getMahasiswaById($id)
{
    $conn = connectDB();

    $id = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $mahasiswa = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return $mahasiswa;
}

// Mengupdate data mahasiswa
function updateMahasiswa($id, $nim, $nama, $jurusan)
{
    $conn = connectDB();

    $id = mysqli_real_escape_string($conn, $id);
    $nim = mysqli_real_escape_string($conn, $nim);
    $nama = mysqli_real_escape_string($conn, $nama);
    $jurusan = mysqli_real_escape_string($conn, $jurusan);

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id='$id'";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

// Menghapus data mahasiswa berdasarkan ID
function deleteMahasiswa($id)
{
    $conn = connectDB();

    $id = mysqli_real_escape_string($conn, $id);

    $sql = "DELETE FROM mahasiswa WHERE id='$id'";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

?>