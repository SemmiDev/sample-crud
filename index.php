<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto p-4">
        <?php include 'functions.php'; ?>

        <?php
        $mahasiswaList = getAllMahasiswa();
        ?>

        <h1 class="text-2xl font-bold mb-4">Data Mahasiswa</h1>

        <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded">Tambah
            Mahasiswa</a>

        <?php if (count($mahasiswaList) > 0) : ?>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswaList as $mahasiswa) : ?>
                <tr>
                    <td class="border text-center px-4 py-2"><?php echo $mahasiswa['nim']; ?></td>
                    <td class="border text-center px-4 py-2"><?php echo $mahasiswa['nama']; ?></td>
                    <td class="border text-center px-4 py-2"><?php echo $mahasiswa['jurusan']; ?></td>
                    <td class="border text-center px-4 py-2">
                        <a href="edit.php?id=<?php echo $mahasiswa['id']; ?>"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                        <a href="delete.php?id=<?php echo $mahasiswa['id']; ?>"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
        <p class="mt-5">Tidak ada data mahasiswa.</p>
        <?php endif; ?>
    </div>
</body>

</html>