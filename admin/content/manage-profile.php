<?php 
    include 'config/koneksi.php'; 
    if(isset($_POST['simpan'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $time = $_POST['time'];
        $position = $_POST['position'];
        $position_desc = $_POST['position_desc'];
        $status = $_POST['status'];
        
        // var_dump();

        $queryProfile = mysqli_query($config, "SELECT * FROM about ORDER BY id DESC");
        if(mysqli_num_rows($queryProfile) > 0){
            //perintah update
            $rowProfile = mysqli_fetch_assoc($queryProfile);
            $id = $rowProfile['id'];
            $update = mysqli_query($config, "UPDATE about SET name='$name',description='$description',time='$time',position='$position',position_desc='$position_desc', status='$status' WHERE id = '$id'");
            header ("location:?page=manage-profile&ubah=berhasil");
        }else{
            // if(!empty($photo)){
                //jika user upload gambar
            // }else{
                $insertQ = mysqli_query ($config, "INSERT INTO `about`(`name`, `description`, `time`, `position`, `position_desc`, `status`) VALUES ('$name','$description','$time','$position','$position_desc','$status')");
                header('location:?page=manage-profile&tambah=berhasil');
            // }
        }
        // if($photo['error'] == 0){
        //     $fileName = uniqid(). "_" . basename($photo['name']);
        //     $filePath = "uploads/" . $fileName;
        //     move_uploaded_file($photo['tmp_name'], $filePath);
            
        // }
        // if ($insertQ) {
        //     header("location:dashboard.php?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
        // }
    }


    $selectProfile = mysqli_query($config, "SELECT * FROM about");
    $row = mysqli_fetch_assoc($selectProfile);

    // if(isset($_GET['del'])){
    //     $idDel = $_GET['del'];
    //     $selectPhoto= mysqli_query ($config, "SELECT photo FROM profiles WHERE id = $idDel");
    //     $rowPhoto = mysqli_fetch_assoc($selectPhoto);
    //     if(isset($rowPhoto['photo'])){
    //         unlink("uploads/".  $row['photo']); //unlink berfungsi   untuk menghapus file dari sistem file bukan database
    //     }
    //     $delete = mysqli_query($config, "DELETE FROM `profiles` WHERE id = $idDel");
    //     if($delete){

    //     }
    // }
    
?>



<!-- <form action="" method="post" enctype="multipart/form-data">
    <div class="m-2" style="width:55%">
        <div class="mb-3">
            <label for="">Judul</label>
            <input type="text" value="<?php echo !isset($row['profile_name'])? '' : $row['profile_name'] ?>" class="form-control border border-secondary-subtle" name="profile_name">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Profesion</label>
            <input type="text" value="<?php echo !isset($row['profesion'])? '' : $row['profesion'] ?>" class="form-control border border-secondary-subtle" name="profesion">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="5" class="form-control border border-secondary-subtle"><?php echo !isset($row['description'])? '' : $row['description'] ?></textarea>
        <br>
        </div>
        

        

        <label for="" class="form-label">photo</label>
        <input type="file" class="form-control border border-secondary-subtle" name="photo" >
        <img src="uploads/<?php echo $row['photo']?>" width="150" alt=""><br>
        <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>

        <!-- <?php if(empty($row['profile_name'])){ ?>
            
        <?php }else{ ?>   
            <a onclick="return confirm ('Yakin ingin hapus')" href="?level=<?php echo base64_encode($_SESSION['LEVEL'])?> & page=manage-profile&del=<?php echo $row ['id']?>" class="btn btn-danger mt-2">Delete</a>
        <?php } ?> -->
        
        
        

    </div>
</form>

<form action="" method="post">
    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Nama: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text" class="form-control border border-secondary-subtle" placeholder="Insert Your Name" value="<?= isset($row['name'])? $row['name'] : '' ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Description: *</label>
        </div>
        <div class="col-sm-10">
            <textarea required id='summernote' name="description" class="form-control border border-secondary-subtle" placeholder="Description"><?= !isset($row['description'])? '' : $row['description']; ?></textarea> 
        </div>
    </div>

   <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Time: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="time" type="date" class="form-control border border-secondary-subtle" placeholder="Time" value="<?= isset($row['time'])? $row['time'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position" type="text" class="form-control border border-secondary-subtle" placeholder="Position" value="<?= isset($row['position'])? $row['position'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position Description: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position_desc" type="text" class="form-control border border-secondary-subtle" placeholder="Position Description" value="<?= isset($row['position_desc'])? $row['position_desc'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Status *</label>
        </div>
        <div class="col-sm-10">
            <input required name="status" type="text" class="form-control border border-secondary-subtle" placeholder="Status" value="<?= isset($row['status'])? $row['status'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3 text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit'])? 'edit': 'simpan'; ?>">Save</button>
        </div>
    </div>

</form>