<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    deleteMahasiswa($id);

    header("Location: index.php");
} else {
    echo "ID mahasiswa tidak valid.";
}
?>