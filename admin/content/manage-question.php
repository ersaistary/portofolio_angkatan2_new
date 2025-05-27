<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    $qusetion= $_POST['qusetion'];
    $answer= $_POST['answer'];
    $id = $_POST['id'];

    if (!empty($id)) {
        $queryQuestion = mysqli_query($config, "SELECT * FROM qusetion WHERE id='$id'");
        if (mysqli_num_rows($queryQuestion) > 0) {
            $update = mysqli_query($config, "UPDATE qusetion SET qusetion='$qusetion', answer='$answer' WHERE id='$id'");
            header("location:?page=manage-question&ubah=berhasil");
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        $insertQ = mysqli_query($config, "INSERT INTO question (question, answer) VALUES ('$question', '$answer')");
        header("location:?page=manage-question&tambah=berhasil");
    }
}

// Ambil semua data untuk ditampilkan
$selectQuestion = mysqli_query($config, "SELECT * FROM question");
?>

<!-- FORM INPUT -->
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">

    <div>
        <div class="mb-3">
            <label class="form-label">Question:</label>
            <input type="text" value="" class="form-control" name="qusetion">
        </div>
        <div class="mb-3">
            <label class="form-label">Answer:</label>
            <textarea name="answer" id="" class="form-control"></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>
