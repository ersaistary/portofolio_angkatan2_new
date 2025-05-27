<?php 
    // Assuming the $config connection is already established
    $query = mysqli_query($config, "SELECT * FROM area1_content ORDER BY id DESC");
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $queryDelete = mysqli_query($config, "DELETE FROM area1_content WHERE id='$id'");
        header("Location: ?page=area1_content&hapus=berhasil");
        exit;
    }
?>

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=manage-area1_content" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-hover table-bordered border-secondary-subtle" id="table">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Head</th>
                <th>Head Description</th>
                <th>Design Tools</th>
                <th>Tools Description</th>
                <th>Dev Skill</th>
                <th>Skill Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $key => $data): ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data['head'] ?></td>
                    <td><?= $data['head_description'] ?></td>
                    <td><?= $data['design_tools'] ?></td>
                    <td><?= $data['tools_desc'] ?></td>
                    <td><?= $data['dev_skill'] ?></td>
                    <td><?= $data['skill_desc'] ?></td>
                    <td class="text-center">
                        <a href="?page=manage-area1_content&edit=<?= $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="?page=area1_content&delete=<?= $data['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
