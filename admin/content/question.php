<?php 
    $query = mysqli_query($config, "SELECT * FROM question ORDER BY id desc");
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $queryDelete = mysqli_query($config, "DELETE FROM question WHERE id='$id'");
        header("location:?page=question&hapus=berhasil");
    }
?>

<div class="table-responsive">
    <div align="right"class="mb-3">
        <a href="?page=manage-question" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-hover table-bordered border-secondary-subtle" id='table'>
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Questions</th>
                <th>Answer</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $key => $data): ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data ['question']?></td>
                    <td><?= $data ['answer']?></td>
                    <td class="text-center">
                        <a href="?page=manage-question&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="?page=question&delete=<?php echo $data['id']?>" onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>