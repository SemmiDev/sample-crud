<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto p-4">
        <?php include 'functions.php'; ?>

        <h1 class="text-2xl font-bold mb-4">Edit Mahasiswa</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mahasiswa = getMahasiswaById($id);

            if ($mahasiswa) :
        ?>
        <form action="" method="POST" class="w-full max-w-sm">
            <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nim">NIM</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nim" name="nim" type="text" value="<?php echo $mahasiswa['nim']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nama" name="nama" type="text" value="<?php echo $mahasiswa['nama']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jurusan">Jurusan</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="jurusan" name="jurusan" type="text" value="<?php echo $mahasiswa['jurusan']; ?>" required>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" name="submit">Update</button>
                <a href="index.php"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"">Kembali</a>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $nim = $_POST['nim'];
                    $nama = $_POST['nama'];
                    $jurusan = $_POST['jurusan'];

                    updateMahasiswa($id, $nim, $nama, $jurusan);

                    header("Location: index.php");
                }
                ?>

            <?php else : ?>
                <p>Data mahasiswa tidak ditemukan.</p>
            <?php endif; ?>

        <?php } else { ?>
            <p>ID mahasiswa tidak valid.</p>
        <?php } ?>
    </div>
</body>

</html>