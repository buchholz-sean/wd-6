<div class="container">
      <div class="jumbotron">
        <h1>Edit Item</h1>
        <hr>
        <form action="/about/editItem" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="newName" value="<?echo $data["fruitname"]?>">
            </div>
                <input type="submit" class="btn btn-default" name="submit" value="Submit">
        </form>
      </div>

</div> <!-- /container -->