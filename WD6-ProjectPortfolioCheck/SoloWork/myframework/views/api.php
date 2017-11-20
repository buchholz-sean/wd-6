<div class="container">
    <div class="jumbotron">
        <h1>Books</h1>
        <?php

        foreach ($data as $item) {
            echo $item["volumeInfo"]["title"].'<br>';
        }

        ?>
    </div>
</div>