<?php include("../layout/header.php");

$sql = "select * from categories order by name";
$query = mysqli_query($db, $sql);

?>

<div class="container">
    <p class="alert alert-success">Selamat Datang <span class="text-primary fw-bolder"><?= $_SESSION['name']; ?></span> di Halaman Category</p>
    <?php
    if (isset($_GET['error'])) {
    ?>
        <div class="alert alert-danger">
            <?= $_GET['error'] ?>
        </div>
    <?php
    }
    ?>
    <?php
    if (isset($_GET['success'])) {
    ?>
        <div class="alert alert-success">
            <?= $_GET['success'] ?>
        </div>
    <?php
    }
    ?>
    <div class="container text-center mt-5">
        <h1 class="display-4">Category List</h1>
    </div>
    <a href="form.php" class="btn btn-primary mb-3"><i class="bi bi-person-fill-add"></i> Add Data</a>
    <table id="my-datatables" class="table table-striped table-bordered table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Note</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($categories = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $categories['name']; ?></td>
                    <td><?= $categories['note']; ?></td>
                    <td>
                        <div class="d-flex">
                            <a href="form.php?id=<?= $categories["id"]; ?>" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="delete-process.php" method="post">
                                <input type="hidden" name="id" value="<?= $categories["id"]; ?>">
                                <button type="submit" name="submit" onclick="return confirm('Anda yakin menghapus data ini?');" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
</div>

<?php include("../layout/footer.php"); ?>