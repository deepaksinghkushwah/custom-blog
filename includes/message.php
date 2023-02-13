<?php
if(isset($_SESSION['msg'])){
    ?>
    <div class="msg">
        <?=$_SESSION['msg']?>
    </div>
    <?php
    unset($_SESSION['msg']);
}

if(isset($_SESSION['err_msg'])){
    ?>
    <div class="err_msg">
        <?=$_SESSION['err_msg']?>
    </div>
    <?php
    unset($_SESSION['err_msg']);
}