<div class="container">
    <div class="jumbotron">
        <h1>XKCD Viewer</h1>
        <form action="/comic" method="post">
            <div class="form-group">
                <input type="submit" name="submit" value="Get Random Comic" class="btn btn-primary">
            </div>
        </form>
        <form action="/comic/selectComic" method="post" class="form-inline">
            <div class="form-group">
                <input type="number" name="comic" value="<?echo $data["num"]; ?>" class="form-control">
                <input type="submit" name="select" value="Get This Comic" class="btn btn-default">
            </div>
        </form>
    </div>
    <div class="panel panel-primary">
        <?php
        if ($data) {
            echo '<div class="panel-heading">';
            echo '<h4 class="panel-title">'.$data["safe_title"].'</h4>';
            echo '</div>';
            echo '<div class="panel-body">';
            echo '<img src='.$data["img"].'>';
            echo '<p>'.$data["alt"].'</p>';
            echo '</div><div class="panel-footer">';
            echo '<p class="text-muted">Originally posted on '.$data["month"].'/'.$data["day"].'/'.$data["year"].' at <a href="http://www.xkcd.com/'.$data["num"].'">xkcd.com/'.$data["num"].'</a>.</p>';
            echo '</div>';
        }
        ?>
    </div> <!-- /panel -->
</div>