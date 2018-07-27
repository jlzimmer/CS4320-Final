<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>CSSpalette</title>

        <!-- Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="JScolor/jscolor.js"></script>
        <script src="script.js"></script>
    </head>

    <body>
        <div class="jumbotron">

          <div id="header">
                <h1>Not Your Daddy's Color Generator</h1>
            </div>

            <!-- Form works with utilities/handler.php -- DO NOT MODIFY -->
            <form action="utilities/handler.php" method="POST">
                <div class="form-group">
                    <label for="color">Color picker (click to change): </label>
                    <input id="color" name="color" class="jscolor {onFineChange:'update(this)',closable:true,closeText:'Close'}" value="ffffff">
                    <br/>
                    R, G, B = <span id="rgb"></span>
                    <br/>
                    H, S, V = <span id="hsv"></span>
                </div>
                <div class="form-group">
                    <label for="offset">Saturation offset (to make your chosen color "pop" more or less):</label>
                    <input id="offset" name="offset" placeholder="(-99 to 99)">
                </div>
                <span>Color palette mode:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mode" id="Radio1" value="mono">
                    <label class="form-check-label" for="Radio1"> Monochrome</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mode" id="Radio2" value="comp">
                    <label class="form-check-label" for="Radio2"> Compound</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mode" id="Radio3" value="tri">
                    <label class="form-check-label" for="Radio3"> Triadic</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mode" id="Radio4" value="analog">
                    <label class="form-check-label" for="Radio4"> Analogous</label>
                </div>
                <br/>
                <button name="submit" type="submit" class="btn btn-outline-primary">Generate color palette</button>
            </form>

    <footer id="footer">
    <p>Zimmer Intelligence LLC</p>
    <address>
            Written by <a href="mailto:jlz6w7@mail.missouri.edu">Jacob Zimmer</a>,
                       <a href="mailto:sig972@mail.missouri.edu">Skyler Gunn</a>, 
                       <a href="mailto:watkinssco@mail.missouri.edu">Scott Watkins</a>, &
                       <a href="mailto:watsonzm@mail.missouri.edu">Zach Watson</a>
            </address>
    </footer>
        </div>
        
    </body>
</html>
