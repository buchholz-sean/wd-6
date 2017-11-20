<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Change Password</h1>
        <form action="/account/updateUser" method="POST">
          <div class="form-group">
            <label for="oldpassinput">Old Password</label>
            <input type="password" class="form-control" id="oldpassinput" name="oldpass">
        </div>
        <div class="form-group">
            <label for="passwordinput">New Password</label>
            <input type="password" class="form-control" name="password" id="passwordinput">
            <label for="passwordverify">Retype New Password</label>
            <input type="password" class="form-control" name="passwordverify" id="passwordverifyinput">
          </div>
          <p>
              <input type="submit" name="submit" value="Update" class="btn btn-primary" id="register" />
          </p>
        </form>
        <span class="label label-danger"><?=@$_REQUEST["passmsg"]?$_REQUEST["passmsg"]:'';?></span>

      </div>

</div> <!-- /container -->