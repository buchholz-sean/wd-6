<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>New User</h1>
        <form action="/account/addUser" method="POST">
          <div class="form-group">
            <label for="usernameinput">Username</label>
            <input type="text" class="form-control" id="usernameinput" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="passwordinput">Password</label>
            <input type="password" class="form-control" name="password" id="passwordinput" placeholder="Enter password">
            <label for="passwordverify">Retype Password</label>
            <input type="password" class="form-control" name="passwordverify" id="passwordverifyinput" placeholder="Enter password again">
          </div>
          <p>
              <input type="submit" name="submit" value="Register" class="btn btn-primary" id="register" />
          </p>
        </form>
        <span class="label label-danger"><?=@$_REQUEST["regmsg"]?$_REQUEST["regmsg"]:'';?></span>

      </div>

</div> <!-- /container -->