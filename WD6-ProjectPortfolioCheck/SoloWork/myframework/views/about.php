<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Fruit</th>
                      <th colspan='2'>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      foreach ($data as $fruit) {
                          echo '<tr><td class="col-md-8">'.$fruit['name'].'</td>
                          <td><a href="/about/editForm?id='.$fruit['id'].'">Edit</a></td>
                          <td><a href="/about/deleteItem?id='.$fruit['id'].'">Delete</a></td></tr>';
                      };
                  ?>
              </tbody>
          </table>
        <hr>
            <a href="/about/addForm" class="btn btn-primary">Add Items &raquo;</a>
      </div>
</div> <!-- /container -->