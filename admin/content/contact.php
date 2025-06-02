<?php 
    $query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id desc");
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $queryDelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
        header("location:user.php?hapus=berhasil");
    }
?>

<div class="table-responsive">
    <table class="table table-hover table-bordered border-secondary-subtle" id='table'>
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Projects Detail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $key => $data): ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data ['name']?></td>
                    <td><?= $data ['email']?></td>
                    <td><?= $data ['project_details']?></td>
                    <td><a href="?page=balas-pesan&idPesan=<?php echo $data['id']?>" class="btn btn-success">Balas Pesan</a></td>
                    
                    <!-- <td class="text-center">
                        <a href="?delete=<?php echo $data['id']?>" onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm">Delete</a>
                    </td> -->
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>