<?php
$sql = "SELECT * FROM `blogs` WHERE created_by = '" . $_SESSION['user']['id'] . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?=date('l d M Y', strtotime($row['created_at']))?></td>
                    <td>
                        <a class="btn" href="<?=APP_URL.'/blog-edit.php?id='.$row['id']?>">Edit</a> | 
                        <a class="btn" href="<?=APP_URL.'/blog-delete.php?id='.$row['id']?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
