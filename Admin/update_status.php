<?php
// Koneksi ke database
include '../config.php';

// Periksa apakah request-nya POST dan ada data yang dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $status_ajuan = $_POST['status_ajuan'];

    // Query untuk mengupdate status_ajuan berdasarkan id
    $sql = "UPDATE pndftr_beasiswa SET status_ajuan = '$status_ajuan' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Status berhasil diperbarui');
                window.location.href = '../admin/dashboard.php'; // Redirect ke halaman hasil setelah update
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui status: " . $conn->error . "');
                window.location.href = 'dashboard.php'; // Redirect jika gagal
              </script>";
    }

    $conn->close();
} else {
    echo "Tidak ada data yang dikirim.";
}
?>
