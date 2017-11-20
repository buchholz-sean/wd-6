<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Dynamic Log In</h1>
        <p>Please upload a properly credentialed .txt file to log in.</p>
        <hr>
        <form action="/dynamic/formlogin" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="btn btn-info btn-file">Select File
                    <input type="file" name="creds" style="display:none;">
                </label>
                <input type="submit" value="Log In" class="btn btn-primary">
            </div>
            <span class="label label-danger"><?=@$_REQUEST["credmsg"]?$_REQUEST["credmsg"]:''; ?></span>
        </form>
      </div>

</div> <!-- /container -->