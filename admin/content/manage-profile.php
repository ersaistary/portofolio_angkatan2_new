<?php 
    include 'config/koneksi.php'; 
    if(isset($_POST['simpan'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $time1 = $_POST['time1'];
        $position1 = $_POST['position1'];
        $position_desc1 = $_POST['position_desc1'];
        $time2 = $_POST['time2'];
        $position2 = $_POST['position2'];
        $position_desc2 = $_POST['position_desc2'];
        $time3 = $_POST['time3'];
        $position3 = $_POST['position3'];
        $position_desc3 = $_POST['position_desc3'];
        $time4 = $_POST['time4'];
        $position4 = $_POST['position4'];
        $position_desc4 = $_POST['position_desc4'];
        $status = $_POST['status'];
        
        // var_dump();

        $queryProfile = mysqli_query($config, "SELECT * FROM about ORDER BY id DESC");
        if(mysqli_num_rows($queryProfile) > 0){
            //perintah update
            $rowProfile = mysqli_fetch_assoc($queryProfile);
            $id = $rowProfile['id'];
            // $update = mysqli_query($config, "UPDATE about SET name='$name',description='$description',time1='$time1',position1='$position1',position_desc1='$position_desc1', status='$status' WHERE id = '$id'");
            $updates= mysqli_query($config, "UPDATE `about` SET `name`='$name',`description`='$description',`time1`='$time1',`position1`='$position1',`position_desc1`='$position_desc1',`time2`='$time2',`position2`='$position2',`position_desc2`='$position_desc2',`time3`='$time3',`position3`='$position3',`position_desc3`='$position_desc3',`time4`='$time4',`position4`='$position4',`position_desc4`='$position_desc4',`status`='$status'  WHERE id = '$id'");
            header('location:?page=manage-profile&edit=berhasil');

            

        }else{
            // if(!empty($photo)){
                //jika user upload gambar
            // }else{
                $insertQ = mysqli_query ($config, "INSERT INTO `about`(`name`, `description`, `time1`, `position1`, `position_desc1`, `status`) VALUES ('$name','$description','$time1','$position1','$position_desc1','$status')");
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
    

    <div class="row mb-3 mt-5" >
        <label for="" class="form-label text-center fw-bold">
            Position 1
        </label>
    </div>
   <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Time: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="time1" type="text" class="form-control border border-secondary-subtle" placeholder="Time" value="<?= isset($row['time1'])? $row['time1'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position1" type="text" class="form-control border border-secondary-subtle" placeholder="Position" value="<?= isset($row['position1'])? $row['position1'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position Description: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position_desc1" type="text" class="form-control border border-secondary-subtle" placeholder="Position Description" value="<?= isset($row['position_desc1'])? $row['position_desc1'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3 mt-5" >
        <label for="" class="form-label text-center fw-bold">
            Position 2
        </label>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Time: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="time2" type="text" class="form-control border border-secondary-subtle" placeholder="Time" value="<?= isset($row['time2'])? $row['time2'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position2" type="text" class="form-control border border-secondary-subtle" placeholder="Position" value="<?= isset($row['position2'])? $row['position2'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position Description: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position_desc2" type="text" class="form-control border border-secondary-subtle" placeholder="Position Description" value="<?= isset($row['position_desc2'])? $row['position_desc2'] : '' ?>"> 
        </div>
    </div>


    <div class="row mb-3 mt-5" >
        <label for="" class="form-label text-center fw-bold">
            Position 3
        </label>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Time: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="time3" type="text" class="form-control border border-secondary-subtle" placeholder="Time" value="<?= isset($row['time3'])? $row['time3'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position3" type="text" class="form-control border border-secondary-subtle" placeholder="Position" value="<?= isset($row['position3'])? $row['position3'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position Description: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position_desc3" type="text" class="form-control border border-secondary-subtle" placeholder="Position Description" value="<?= isset($row['position_desc3'])? $row['position_desc3'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3 mt-5" >
        <label for="" class="form-label text-center fw-bold">
            Position 4
        </label>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Time: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="time4" type="text" class="form-control border border-secondary-subtle" placeholder="Time" value="<?= isset($row['time4'])? $row['time4'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position4" type="text" class="form-control border border-secondary-subtle" placeholder="Position" value="<?= isset($row['position4'])? $row['position4'] : '' ?>"> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 text-center">
            <label for="" class="form-label">Position Description: *</label>
        </div>
        <div class="col-sm-10">
            <input required name="position_desc4" type="text" class="form-control border border-secondary-subtle" placeholder="Position Description" value="<?= isset($row['position_desc4'])? $row['position_desc4'] : '' ?>"> 
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