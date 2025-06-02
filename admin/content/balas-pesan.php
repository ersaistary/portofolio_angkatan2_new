<?php
// Pastikan koneksi database ($config) telah terdefinisi

// Ambil data pesan berdasarkan GET parameter 'idPesan'
if (isset($_GET['idPesan'])) {
    // Sanitasi input untuk menghindari SQL injection
    $getId = intval($_GET['idPesan']);
    $selectPesan = mysqli_query($config, "SELECT * FROM `contacts` WHERE id = $getId");
    $row = mysqli_fetch_assoc($selectPesan);
}

// Proses kirim email saat form disubmit
if (isset($_POST['balas'])) {
    $message = $_POST['message'];
    $email = $row['email'];
    
    // Siapkan header email dengan benar
    $headers = "From: ersaistary31@gmail.com\r\n" .
               "Reply-To: ersaistary31@gmail.com\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n" .
               "MIME-Version: 1.0\r\n";
    
    // Tentukan subject email
    $subject = "Balasan Pesan";
    
    // Kirim email dan redirect bila sukses
    if (mail($email, $subject, $message, $headers)) {
        header("Location: ?page=balas-pesan");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Balas Pesan</title>
    <!-- Sertakan CSS tambahan jika diperlukan -->
</head>
<body>
    <div class="m-2">
        <ul>
            <li>
                <div class="row">
                    <div class="col-2">Name</div>
                    <div class="col-7">
                        : <?= isset($row['name']) ? htmlspecialchars($row['name']) : '' ?>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-2">Email</div>
                    <div class="col-7">
                        : <?= isset($row['email']) ? htmlspecialchars($row['email']) : '' ?>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-2">Project Details</div>
                    <div class="col-7">
                        : <?= isset($row['project_details']) ? htmlspecialchars($row['project_details']) : '' ?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    <!-- Pastikan method form di-set ke POST, dan action diarahkan ke halaman yang sama -->
    <form method="post" action="">
        <div class="m-2">
            <label for="message">Message:</label>
            <textarea name="message" id="summernote"></textarea>
            <button type="submit" class="btn btn-success mt-3" name="balas">Balas Pesan</button>
        </div>
    </form>
</body>
</html>