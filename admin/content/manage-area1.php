<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    $id = $_POST['id']; // ID untuk update jika tersedia

    if (!empty($id)) {
        // UPDATE DATA berdasarkan ID yang dipilih
        $queryArea1 = mysqli_query($config, "SELECT * FROM area1 WHERE id='$id'");
        if (mysqli_num_rows($queryArea1) > 0) {
            $rowArea1 = mysqli_fetch_assoc($queryArea1);
            if (!empty($photo)) {
                unlink("uploads/" . $rowArea1['photo']); 
                move_uploaded_file($tmp_name, $filePath); 
                $update = mysqli_query($config, "UPDATE area1 SET photo='$fileName' WHERE id ='$id'");
            }
            header("location:?page=manage-area1&ubah=berhasil");
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        if (!empty($photo)) {
            move_uploaded_file($tmp_name, $filePath);
            $insertQ = mysqli_query($config, "INSERT INTO area1 (photo) VALUES ('$fileName')");
        }
        header("location:?page=manage-area1&tambah=berhasil");
    }
}

$selectArea1 = mysqli_query($config, "SELECT * FROM area1");
?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">

    <div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>
