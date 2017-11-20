<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
          <?if (@$_REQUEST["error"]) {
    ?>
              <span class="alert alert-danger"><?=@$_REQUEST["error"]?$_REQUEST["error"]:''; ?></span>
          <?php
}?>
        <h1>Contact Us</h1>
        <form action="/contact/formRecv" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="emailinput" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Subject</label>
            <select class="form-control" id="exampleSelect1" name="subject">
              <option>I want to know more about SSL</option>
              <option>I have a question about Front-End Dev</option>
              <option>I want to hire you!</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Your Message</label>
            <textarea class="form-control" id="exampleTextarea" name="message" rows="3"></textarea>
          </div>
          <fieldset class="form-group">
            <legend>Experience level</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Beginner (What is HTML?)
              </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                Intermediate (I know some CSS and JavaScript)
              </label>
            </div>
            <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3">
                Advanced (I write my own frameworks)
              </label>
            </div>
          </fieldset>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="newsletter">
              Sign me up for the newsletter!
            </label>
          </div>
          <?php

            function create_image($cap)
            {
                unlink('./assets/image1.png');

                global $image;

                $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

                $background_color = imagecolorallocate($image, 255, 255, 255);
                $text_color = imagecolorallocate($image, 0, 255, 255);
                $line_color = imagecolorallocate($image, 64, 64, 64);
                $pixel_color = imagecolorallocate($image, 0, 0, 255);
                imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

                for ($i = 0; $i < 3; $i++) {
                    imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
                }

                for ($i = 0; $i < 1000; $i++) {
                    imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
                }

                $text_color = imagecolorallocate($image, 0, 0, 0);
                ImageString($image, 22, 30, 22, $cap, $text_color);

                $_SESSION["captcha"] = $cap;

                imagepng($image, "./assets/image1.png");
            }

          create_image($data["cap"]);

          echo "<img src='./assets/image1.png'>";
          ?>
          <div class="form-group">
            <label for="captcha">Enter Captcha </label>
            <input name="captcha" class="form-control" type="captcha" id="captcha"  placeholder="Enter the characters you see above">
          </div>
          <p>
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </p>
        </form>
      </div>

</div> <!-- /container -->