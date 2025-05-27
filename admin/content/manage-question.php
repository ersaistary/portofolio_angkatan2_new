<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $id = $_POST['id']; // ID untuk update jika tersedia

    if (!empty($id)) {
        // UPDATE DATA berdasarkan ID yang dipilih
        $queryQuestion = mysqli_query($config, "SELECT * FROM question WHERE id='$id'");
        if (mysqli_num_rows($queryQuestion) > 0) {
            $update = mysqli_query($config, "UPDATE question SET question='$question', answer='$answer' WHERE id ='$id'");
            header("location:?page=manage-question&ubah=berhasil");
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        // INSERT DATA BARU
        $insertQ = mysqli_query($config, "INSERT INTO question (question, answer) 
        VALUES ('$question', '$answer')");
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
            <label class="form-label">Question</label>
            <input type="text" class="form-control" name="question">
        </div>
        <div class="mb-3">
            <label class="form-label">Answer</label>
            <textarea class="form-control" name="answer" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Save Changes</button>
    </div>
</form>
