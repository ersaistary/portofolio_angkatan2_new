<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $occupation= $_POST['occupation'];
    $testi = $_POST['testi'];
    $id = $_POST['id'];

    if (!empty($id)) {
        $queryTestimonial = mysqli_query($config, "SELECT * FROM testimonials WHERE id='$id'");
        if (mysqli_num_rows($queryTestimonial) > 0) {
            $update = mysqli_query($config, "UPDATE testimonials SET name='$name', occupation='$occupation', testi='$testi' WHERE id='$id'");
            header("location:?page=manage-testimonials&ubah=berhasil");
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        // INSERT DATA BARU ke dalam tabel testimonials
        $insertQ = mysqli_query($config, "INSERT INTO testimonials (name, occupation, testi) VALUES ('$name', '$occupation', '$testi')");
        header("location:?page=manage-testimonials&tambah=berhasil");
    }
}

// Ambil semua data untuk ditampilkan
$selectTestimonial = mysqli_query($config, "SELECT * FROM testimonials");
?>

<!-- FORM INPUT -->
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">

    <div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" value="" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Occupation</label>
            <input type="text" value="" class="form-control" name="occupation">
        </div>
        <div class="mb-3">
            <label class="form-label">Testimonial</label>
            <textarea class="form-control" name="testi" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>
