<?php 
    $query = mysqli_query($config, "SELECT * FROM project ORDER BY id DESC");
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $queryDelete = mysqli_query($config, "DELETE FROM project WHERE id='$id'");
        header("Location: ?page=project&hapus=berhasil");
        exit;
    }
?>

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=manage-project" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-hover table-bordered border-secondary-subtle" id="table">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>For</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($row as $key => $data): ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data['for'] ?></td>
                    <td><?= $data['description'] ?></td>
                    <td><?= $data['image'] ?></td>
                    <td class="text-center">
                        <a href="?page=manage-project&edit=<?= $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="?page=project&delete=<?= $data['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
