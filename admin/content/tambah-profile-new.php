<?php 
    include 'config/koneksi.php'; 
    if(isset($_POST['simpan'])){
        $profile_name = $_POST['profile_name'];
        $profesion = $_POST['profesion'];
        $description = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        
        // var_dump();

        $queryProfile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
        if(mysqli_num_rows($queryProfile) > 0){
            //perintah update
            $rowProfile = mysqli_fetch_assoc($queryProfile);
            $id = $rowProfile['id'];
            $update = mysqli_query($config, "UPDATE profiles SET profile_name='$profile_name', profesion='$profesion', description='$description' WHERE id = '$id'");
            header ("location:?page=manage-profile&ubah=berhasil");
        }else{
            if(!empty($photo)){
                //jika user upload gambar
            }else{
                $insertQ = mysqli_query ($config, "INSERT INTO `profiles`(`profile_name`, `profesion`, `description`) VALUES ('$profile_name','$profesion','$description')");
                header('location:?page=manage-profile&tambah=berhasil');
            }
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


    $selectProfile = mysqli_query($config, "SELECT * FROM profiles");
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



<form action="" method="post" enctype="multipart/form-data">
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