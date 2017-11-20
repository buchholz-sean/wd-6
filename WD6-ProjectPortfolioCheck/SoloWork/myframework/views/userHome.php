<div class="container">
    <div class="jumbotron">
        <span class="label label-success"><?=@$_REQUEST["msg"]?$_REQUEST["msg"]:'';?></span>
        <h1>Welcome back, <?php echo @$_SESSION["username"];?>!</h1>
        <p>It's good to see you again!</p>
        <hr>
        <div class="list-group">
            <a href="account/newPass" class="list-group-item list-group-item-action">Change Password</a>
            <a href="account/confirmDelete" class="list-group-item list-group-item-action">Delete Account</a>
        </div>


    </div>
    <div class="form-group">
        <form action="/profile/updatePic" method="post" enctype="multipart/form-data">
            <label class="btn btn-info btn-file">Browse Files
                <input type="file" name="img" style="display:none;">
            </label>
            <input type="submit" value="Update Profile Picture" class="btn btn-primary">
            <span class="label label-<?=@$_REQUEST["class"]?$_REQUEST["class"]:'';?>"><?=@$_REQUEST["profpicmsg"]?$_REQUEST["profpicmsg"]:''; ?></span>
        </form>
    </div>
    <?php if (@$_SESSION["bio"]) {
    ?>
        <div class="jumbotron">
            <h2>About Me</h2>
            <p>
                <?echo $_SESSION["bio"]?>
            </p>
        </div>
    <?php
}?>
</div>