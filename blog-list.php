<?php
$sql = "SELECT * FROM `blogs` WHERE created_by = '" . $_SESSION['user']['id'] . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
    <table>
        <thead>
            <tr>
                <th width="70%">Title</th>
                <th width="15%">Create At</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?=date('d M Y', strtotime($row['created_at']))?></td>
                    <td>
                        <a class="btn" href="<?=APP_URL.'/blog-edit.php?id='.$row['id']?>">Edit</a> | 
                        <a class="btn" href="<?=APP_URL.'/dashboard.php?action=deleteBlog&id='.$row['id']?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
