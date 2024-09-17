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
                // Jika berhasil, tampilkan pesan pop-up
                echo "<script>
                        alert('Data berhasil disimpan!');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                // Jika gagal, tampilkan pesan pop-up error
                echo "<script>
                        alert('Data gagal disimpan: " . $conn->error . "');
                        window.location.href = 'index.php';
                      </script>";
            }
        } else {
            // Jika gagal mengupload file
            echo "<script>
                    alert('Terjadi kesalahan saat mengupload file.');
                    window.location.href = 'index.php';
                  </script>";
        }
    } else {
        // Jika file tidak sesuai format
        echo "<script>
                alert('Hanya file dengan format JPG, PNG, dan PDF yang diperbolehkan.');
                window.location.href = 'index.php';
              </script>";
    }

    $conn->close();
}
?>
