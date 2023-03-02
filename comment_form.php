<form action="" method="post">
    <input type="hidden" name="blog_id" value="<?=$_GET['id']?>">
    <h3>Comments</h3>
    <table>
        <tr>
            <td><textarea name="comment" id="comment" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><button type="submit" name="btnSaveComment">Add Comment</button></td>
        </tr>
    </table>
</form>