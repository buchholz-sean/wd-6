<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Ajax Log In</h1>
        <form action="/ajax/ajaxParams" method="POST">
          <div class="form-group">
            <label for="usernameinput">Username</label>
            <input type="text" class="form-control" id="usernameinput" name="username" placeholder="Enter username">
            <label for="passwordinput">Password</label>
            <input type="password" class="form-control" name="password" id="passwordinput" placeholder="Enter password">
          </div>
          <p>
              <input type="button" name="ajaxsubmit" value="Log In" class="btn btn-secondary" id="submitform" />
              <button type="button" class="btn btn-info" data-toggle="popover" title="Form Info" data-content="This is a custom Ajax form.">Form Info</button>
          </p>
          <span class="label label-danger"><?=@$_REQUEST["ajaxmsg"]?$_REQUEST["ajaxmsg"]:'';?></span>
        </form>
      </div>

</div> <!-- /container -->