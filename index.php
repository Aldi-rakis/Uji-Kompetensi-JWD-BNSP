<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $program_beasiswa = $_POST['program_beasiswa'];

    // Proses upload file
    $target_dir = "uploads/";
    $file_name = basename($_FILES["file_upload"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file yang diizinkan
    $allowed_types = array('jpg', 'png', 'pdf');
    if (in_array($file_type, $allowed_types)) {
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            // Query untuk menyimpan data
            $sql = "INSERT INTO pndftr_beasiswa (nama, email, phone, semester, ipk, program_beasiswa, file_upload)
                    VALUES ('$nama', '$email', '$phone', '$semester', '$ipk', '$program_beasiswa', '$file_name')";

            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Terjadi kesalahan saat mengupload file.";
        }
    } else {
        echo "Hanya file dengan format JPG, PNG, dan PDF yang diperbolehkan.";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>JWD</title>
    <script src="/script.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>


    <!-- Navbar -->
    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="Assets/logo (3).png" class="h-8" alt="Logo">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white max-sm:text-sm">Beasiswa
                    JWD</span>
            </a>
            <div class="flex md:order-2 space-x-2 md:space-x-0 rtl:space-x-reverse">
                <img class="w-10 h-10 rounded-full" src="Assets/avataaars.svg" alt="Rounded avatar">

                <a href="admin/dashboard.php"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Admin
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
                <ul
                    class="flex flex-col p-3 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Daftar</a>
                    </li>
                    <li>
                        <a href="hasil.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container with Form -->
    <div class="flex flex-col justify-center items-center min-h-screen max-sm:mx-4 py-[80px]">
        <h1 class="text-2xl font-bold mb-8 max-sm:text-lg">Selamat datang di Beasiswa JWD Silahan isi Form dibawah dan
            isi data anda</h1>
        <div class="w-full max-w-lg p-8 bg-blue-100 rounded-lg shadow-lg">
            <div>


                <!-- FORM -->
                <form action="submit.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <h4 class="text-xl font-bold mb-1">Data Pribadi</h4>
                        <div class="flex mb-2" id="name">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input type="text" id="name" name="nama" required
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama" required>
                        </div>

                        <div class="flex mb-2" id="email">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M2.94 5.68 9.71 9.29a1 1 0 0 0 .58.18 1 1 0 0 0 .58-.18l6.77-3.61A1 1 0 0 0 17 4H3a1 1 0 0 0-.06 1.68Zm14.12 2.64-5.87 3.13a3 3 0 0 1-2.3 0L3 8.32v5.68a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.32a.94.94 0 0 0-.94-.94Z" />
                                </svg>
                            </span>
                            <input type="email" id="email-input" name="email"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Email">
                        </div>

                        <div class="flex mb-2" id="phone">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M11.5 0A8.5 8.5 0 1 0 20 8.5 8.51 8.51 0 0 0 11.5 0Zm-1 17a1.502 1.502 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5Zm3.3-4.5H7.2a.8.8 0 0 1 0-1.6h.5V7.5a2.8 2.8 0 0 1 5.6 0v3.4h.5a.8.8 0 0 1 0 1.6Z" />
                                </svg>
                            </span>
                            <input type="tel" id="phone-input" name="phone"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nomor Telepon">
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xl font-bold mb-1">Semeteser dan IPK terakhir</h4>
                        <div class="mb-3">
                            <select id="semester" name="semester"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                                <option value="" disabled selected>Pilih Semester anda saat ini...</option>
                                <option value="program1">Semester 1</option>
                                <option value="Semester2">Semester 2</option>
                                <option value="Semester3">Semester 3</option>
                                <option value="Semester4">Semester 4</option>
                                <option value="Semester5">Semester 5</option>
                                <option value="Semester6">Semester 6</option>
                                <option value="Semester7">Program 7</option>
                                <option value="Semester8">Program 8</option>
                            </select>
                        </div>

                        <div class="flex mb-2" id="ipk">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input type="text" id="ipk-input" name="ipk" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input IPK" readonly>
                            <button type="button" id="random-ipk-btn" class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Cek IPK
                            </button>
                        </div>


                    </div>

                    <div>
                        <h4 class="text-xl font-bold mb-1"> Berkas Beasiswa</h4>


                        <div class="mb-3">
                            <select id="program_beasiswa" name="program_beasiswa"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                                <option value="" disabled selected>Pilih Program Beasiswa</option>
                                <option value="program1">Beasiswa Akademik</option>
                                <option value="Beasiswa2">Beasiswa Non Akademik</option>
                                <option value="Beasiswa3">Beasiswa JWD</option>
                                <option value="Beasiswa4">Beasiswa Prestasi</option>
                               
                            </select>
                        </div>


                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.707 10.707a1 1 0 0 0 1.414 0l3-3a1 1 0 1 0-1.414-1.414L11 7.586V1a1 1 0 1 0-2 0v6.586L7.293 6.293A1 1 0 1 0 5.879 7.707l3 3ZM5 14a1 1 0 0 0-1 1v2a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3v-2a1 1 0 1 0-2 0v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2a1 1 0 0 0-1-1Z" />
                                </svg>
                            </span>
                            <input type="file" id="file_upload" name="file_upload" accept=".jpg, .png, .pdf" class="rounded-none px-2 py-2 rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <p class="text-sm mb-3 text-gray-500 dark:text-gray-400 mt-1">Hanya file dengan format .jpg, .png, .pdf yang diperbolehkan.</p>

                    </div>

                    <button type="submit" id="submit-btn" disabled
                        class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
                </form>
            </div>
        </div>



        <script>
            document.getElementById('random-ipk-btn').addEventListener('click', function() {
                // Generate random IPK
                const randomIPK = Math.random() < 0.5 ? 3.4 : 2.9;
                const ipkInput = document.getElementById('ipk-input');
                const programBeasiswa = document.getElementById('program_beasiswa');
                const fileUpload = document.getElementById('file_upload');
                const submitBtn = document.getElementById('submit-btn');

                // Set the generated IPK value
                ipkInput.value = randomIPK;

                // Check if IPK is below 3
                if (randomIPK < 3) {
                    // Disable program beasiswa, file upload, and submit button
                    programBeasiswa.disabled = true;
                    fileUpload.disabled = true;
                    submitBtn.disabled = true;
                } else {
                    // Enable program beasiswa, file upload, and submit button
                    programBeasiswa.disabled = false;
                    fileUpload.disabled = false;
                    submitBtn.disabled = false;
                }
            });
        </script>


</body>

</html>