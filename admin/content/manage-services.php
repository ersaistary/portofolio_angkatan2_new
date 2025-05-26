<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    $id = $_POST['id']; // ID untuk update jika tersedia

    if (!empty($id)) {
        // UPDATE DATA berdasarkan ID yang dipilih
        $queryService = mysqli_query($config, "SELECT * FROM services WHERE id='$id'");
        if (mysqli_num_rows($queryService) > 0) {
            $rowService = mysqli_fetch_assoc($queryService);
            if (!empty($photo)) {
                unlink("uploads/" . $rowService['photo']); // Hapus foto lama
                move_uploaded_file($tmp_name, $filePath); // Simpan foto baru
                $update = mysqli_query($config, "UPDATE services SET title='$title', description='$description', photo='$fileName' WHERE id ='$id'");
            } else {
                $update = mysqli_query($config, "UPDATE services SET title='$title', description='$description' WHERE id ='$id'");
            }
            header("location:?page=manage-services&ubah=berhasil");
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        // INSERT DATA BARU 
        if (!empty($photo)) {
            move_uploaded_file($tmp_name, $filePath);
            $insertQ = mysqli_query($config, "INSERT INTO services (title, description, photo) 
            VALUES ('$title', '$description','$fileName')");
        } else {
            $insertQ = mysqli_query($config, "INSERT INTO services (title, description) 
            VALUES ('$title', '$description')");
        }
        header("location:?page=manage-services&tambah=berhasil");
    }
}

// Ambil semua data untuk ditampilkan
$selectService = mysqli_query($config, "SELECT * FROM services");
?>

<!-- FORM INPUT -->
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">

    <div>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" value="" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>
