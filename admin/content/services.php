<?php 
    $query = mysqli_query($config, "SELECT * FROM services ORDER BY id desc");
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $queryDelete = mysqli_query($config, "DELETE FROM services WHERE id='$id'");
        header("location:user.php?hapus=berhasil");
    }
?>

<div class="table-responsive">
    <div align="right"class="mb-3">
        <a href="?page=manage-services" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-hover table-bordered border-secondary-subtle" id='table'>
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Photo</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $key => $data): ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data ['title']?></td>
                    <td><?= $data ['description']?></td>
                    <td><?= $data ['photo']?></td>
                    <td class="text-center">
                        <a href="?page=manage-services&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <!-- <a href="manage-services&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a> -->
                        <a href="user.php?delete=<?php echo $data['id']?>" onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>