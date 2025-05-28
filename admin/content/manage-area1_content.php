<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    $head= $_POST['head'];
    $head_description = $_POST['head_description'];
    $design_tools= $_POST['design_tools'];
    $tools_desc = $_POST['tools_desc'];
    $dev_skill= $_POST['dev_skill'];
    $skill_desc= $_POST['skill_desc'];
    $id = $_POST['id']; 

    if (!empty($id)) {
        $queryArea = mysqli_query($config, "SELECT * FROM area1_content WHERE id='$id'");
        if (mysqli_num_rows($queryArea) > 0) {
            $update = mysqli_query($config, "UPDATE area1_content SET 
                head            = '$head', 
                head_description = '$head_description', 
                design_tools    = '$design_tools', 
                tools_desc      = '$tools_desc', 
                dev_skill       = '$dev_skill', 
                skill_desc      = '$skill_desc' 
                WHERE id = '$id'");
            header("Location:?page=manage-area1_content&ubah=berhasil");
            exit;
        } else {
            echo "Data tidak ditemukan untuk diupdate!";
        }
    } else {
        $insert = mysqli_query($config, "INSERT INTO area1_content 
            (head, head_description, design_tools, tools_desc, dev_skill, skill_desc) 
            VALUES 
            ('$head', '$head_description', '$design_tools', '$tools_desc', '$dev_skill', '$skill_desc')");
        header("Location: ?page=manage-area1_content&tambah=berhasil");
        exit;
    }
}

$selectArea = mysqli_query($config, "SELECT * FROM area1_content");
?>


<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
    
    <div>
        <div class="mb-3">
            <label class="form-label">Head</label>
            <input type="text" class="form-control" name="head" value="">
        </div>
        <div class="mb-3">
            <label class="form-label">Head Description</label>
            <textarea class="form-control" name="head_description" cols="30" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Design Tools</label>
            <input type="text" class="form-control" name="design_tools" value="">
        </div>
        <div class="mb-3">
            <label class="form-label">Tools Description</label>
            <textarea class="form-control" name="tools_desc" cols="30" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Dev Skill</label>
            <input type="text" class="form-control" name="dev_skill" value="">
        </div>
        <div class="mb-3">
            <label class="form-label">Skill Description</label>
            <textarea class="form-control" name="skill_desc" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>
