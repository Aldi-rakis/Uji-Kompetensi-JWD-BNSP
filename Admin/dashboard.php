<?php
// Koneksi ke database
include '../config.php';

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel beasiswa
$sql = "SELECT * FROM pndftr_beasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran Beasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../Assets/logo (3).png" class="h-8" alt="Logo">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white max-sm:text-sm">Beasiswa
                    JWD</span>
            </a>
            <div class="flex md:order-2 space-x-2 md:space-x-0 rtl:space-x-reverse">
                <img class="w-10 h-10 rounded-full" src="../Assets/avataaars.svg" alt="Rounded avatar">

                <a href="../index.php"
   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
   Home
</a>


                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-start hidden md:flex md:w-auto md:order-1" id="navbar-sticky">
                <p class="text-gray-700">Selamat Datang admin</p>
            </div>
        </div>
    </nav>



    <div class="container mx-auto px-2 mt-10">
        <h2 class="text-3xl font-bold text-center text-gray-700 mb-5">Hasil Pendaftaran Beasiswa</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-800 text-white text-left">
                        <th class="p-4">ID</th>
                        <th class="p-4">Nama</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Phone</th>
                        <th class="p-4">Semester</th>
                        <th class="p-4">IPK</th>
                        <th class="p-4">Program Beasiswa</th>
                        <th class="p-4">File Upload</th>
                        <th class="p-4">Status Ajuan</th>
                        <th class="p-4">Tanggal Pendaftaran</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    if ($result->num_rows > 0) {
        // Output setiap baris dari hasil query
        while ($row = $result->fetch_assoc()) {
            echo "<form action='update_status.php' method='POST'>";
            echo "<tr class='border-b hover:bg-gray-50'>";
            echo "<td class='p-4'>" . $row['id'] . "</td>";
            echo "<td class='p-4'>" . $row['nama'] . "</td>";
            echo "<td class='p-4'>" . $row['email'] . "</td>";
            echo "<td class='p-4'>" . $row['phone'] . "</td>";
            echo "<td class='p-4'>" . $row['semester'] . "</td>";
            echo "<td class='p-4'>" . $row['ipk'] . "</td>";
            echo "<td class='p-4'>" . $row['program_beasiswa'] . "</td>";
            echo "<td class='p-4'><a href='uploads/" . $row['file_upload'] . "' class='text-blue-500 hover:underline'>Lihat File</a></td>";

            // Tambahkan dropdown untuk memilih status baru
            echo "<td class='p-4'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
            echo "<select name='status_ajuan' class='border border-gray-300 rounded-md p-2'>";
            echo "<option value='Belum Diverikasi' " . ($row['status_ajuan'] == 'Belum Diverikasi' ? 'selected' : '') . ">Belum Diverikasi</option>";
            echo "<option value='Diproses' " . ($row['status_ajuan'] == 'Diproses' ? 'selected' : '') . ">Diproses</option>";
            echo "<option value='Disetujui' " . ($row['status_ajuan'] == 'Disetujui' ? 'selected' : '') . ">Disetujui</option>";
            echo "<option value='Ditolak' " . ($row['status_ajuan'] == 'Ditolak' ? 'selected' : '') . ">Ditolak</option>";
            echo "</select>";
            echo "</td>";

            echo "<td class='p-4'>" . $row['created_at'] . "</td>";

            // Tambahkan tombol untuk update status
            echo "<td class='p-4'><button type='submit' class='text-white bg-blue-500 hover:bg-blue-700 p-2 rounded-md'>Update</button></td>";
            echo "</tr>";
            echo "</form>";
        }
    } else {
        echo "<tr><td colspan='10' class='p-4 text-center text-gray-500'>Tidak ada data</td></tr>";
    }
    ?>
</tbody>

            </table>
        </div>
    </div>

</body>

</html>

<?php
// Tutup koneksi database
$conn->close();
?>