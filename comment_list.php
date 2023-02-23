<table>
    <?php
    $sql = "SELECT c.*, u.username FROM `comments` c LEFT JOIN `users`u ON u.id = c.created_by WHERE c.blog_id = '".$_GET['id']."' ORDER BY c.id DESC";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>
                    <p><?=$row['comment']?></p>
                    <p><?=date('d M Y, H:i', strtotime($row['created_at']))?> By <strong><?=$row['username']?></strong></p>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>