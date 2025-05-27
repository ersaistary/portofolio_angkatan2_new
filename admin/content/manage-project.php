<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    // Retrieve values from the form
    $for             = $_POST['for'];
    $description     = $_POST['description'];
    $imageUploadName = $_FILES['image']['name'];
    $tmp_name        = $_FILES['image']['tmp_name'];
    $fileName        = uniqid() . "_" . basename($imageUploadName);
    $filePath        = "uploads/" . $fileName;
    $id              = $_POST['id']; // Used for updates if available

    if (!empty($id)) {
        // UPDATE existing record based on provided ID
        $queryProject = mysqli_query($config, "SELECT * FROM project WHERE id='$id'");
        if (mysqli_num_rows($queryProject) > 0) {
            $rowProject = mysqli_fetch_assoc($queryProject);
            if (!empty($imageUploadName)) {
                // Delete the old image file if exists
                if (!empty($rowProject['image']) && file_exists("uploads/" . $rowProject['image'])) {
                    unlink("uploads/" . $rowProject['image']);
                }
                // Move the new file upload
                move_uploaded_file($tmp_name, $filePath);
                $update = mysqli_query($config, "UPDATE project SET `for`='$for', description='$description', image='$fileName' WHERE id='$id'");
            } else {
                $update = mysqli_query($config, "UPDATE project SET `for`='$for', description='$description' WHERE id='$id'");
            }
            header("Location: ?page=manage-project&ubah=berhasil");
            exit;
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        // INSERT new record into project table
        if (!empty($imageUploadName)) {
            move_uploaded_file($tmp_name, $filePath);
            $insert = mysqli_query($config, "INSERT INTO project (`for`, description, image) VALUES ('$for', '$description', '$fileName')");
        } else {
            $insert = mysqli_query($config, "INSERT INTO project (`for`, description) VALUES ('$for', '$description')");
        }
        header("Location: ?page=manage-project&tambah=berhasil");
        exit;
    }
}

// Optional: Retrieve all data to display if needed later
$selectProject = mysqli_query($config, "SELECT * FROM project");
?>

<!-- FORM INPUT -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- Hidden field to capture the id for editing -->
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">

    <div>
        <div class="mb-3">
            <label class="form-label">For</label>
            <input type="text" value="" class="form-control" name="for">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>
