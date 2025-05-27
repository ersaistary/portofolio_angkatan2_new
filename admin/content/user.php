<?php 
    include 'config/koneksi.php';
    if($_SESSION['LEVEL'] != 1){
        echo "<h1>Anda tidak berhak ke sini</h1>";
        echo "<a href='dashboard.php' class='btn btn-warning'>Kembali</a>";
        die;
        //header (location:dashboard.php?failed=access); (redirect ke dashboard langsung tapi ngelempah parameter ke link)
    }

    $query = mysqli_query($config, "SELECT levels.name_level, users.* FROM users
    LEFT JOIN levels ON levels.id = users.id_level 
    ORDER BY users.id desc");
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $queryDelete = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
        header("location:user.php?hapus=berhasil");
    }

?>

<div class="table-responsive">
    <div align="right"class="mb-3">
        <a href="?page=tambah-user" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-hover table-bordered border-secondary-subtle" id='table'>
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Level</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $key => $data): ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data ['name_level']?></td>
                    <td><?= $data ['name']?></td>
                    <td><?= $data ['email']?></td>
                    <td class="text-center">
                        <a href="?page=tambah-user&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="page=tambah-user&delete=<?php echo $data['id']?>" onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>