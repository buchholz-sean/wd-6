<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/welcome">SSL</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?=@$data["pagename"]=="welcome"?'class="active"':''?>><a href="/welcome">Welcome</a></li>
        <li <?=@$data["pagename"]=="contact"?'class="active"':''?>><a href="/contact">Contact</a></li>
        <li <?=@$data["pagename"]=="about"?'class="active"':''?>><a href="/about">About</a></li>
        <li <?=@$data["pagename"]=="api"?'class="active"':''?>><a href="/api">API</a></li>
        <li <?=@$data["pagename"]=="comic"?'class="active"':'' ?>><a href="/comic">Comic</a></li>
        <!-- <?php if (!@$_SESSION["loggedin"] || @$_SESSION["loggedin"] != 1) {
    ?>
        <li <?=@$data["pagename"]=="ajax"?'class="active"':''?>><a href="/ajax">Ajax Login</a></li>
        <li <?=@$data["pagename"]=="dynamic"?'class="active"':''?>><a href="/dynamic">Dynamic Login</a></li>
        <?php
}?> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
            if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
                ?>
                <li <?=@$data["pagename"]=="profile"?'class="active"':''?>><a href="/profile">Profile</a></li>
                <li><a href="/auth/logout">Log Out</a></li>
            <?php
            } else {
                ?>
        <form class="navbar-form navbar-right" role="search" action="/auth/login" method="post">
            <span class="label label-danger"><?=@$_REQUEST["msg"]?$_REQUEST["msg"]:''; ?></span>
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="btnlogin">Log In</button>
        </form>
        <li <?=@$data["pagename"]=="register"?'class="active"':''?>><a href="/account/register">Register</a></li>
            <?php
            }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>