<?php
    // Generates a CSS file that is ready to use in a web environment for color schemes
    function generate($palette) {
        $uno = $palette["primary"];
        $dos = $palette["secondary"];
        $tres = $palette["tertiary"];

        $css = <<<STYLE
        .primary {
            color: #$uno;
            background-color: #$uno;
            border-color: #$uno;
        }

        .secondary {
            color: #$dos;
            background-color: #$dos;
            border-color: #$dos;
        }

        .tertiary {
            color: #$tres;
            background-color: #$tres;
            border-color: #$tres;
        }
STYLE;

        return $css;
    }

    function build($css) {
        $html = <<<PAGE
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>CSSpalette - generated</title>
        
                <!-- Bootstrap 4-->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                
                <style>
                      $css
                </style>
            </head>
        
            <body>
                <div class="jumbotron">
                    <h1>Your generated color scheme:</h1>
                </div>
                <div class="card-columns">
                    <div class="card primary">
                        <div class="card-body text-center">
                            <p class="card-text" style="color:black; box-shadow: white">PRIMARY</p>
                        </div>
                    </div>
                    <div class="card secondary">
                        <div class="card-body text-center">
                            <p class="card-text" style="color:black; box-shadow: white">SECONDARY</p>
                        </div>
                    </div>
                    <div class="card tertiary">
                        <div class="card-body text-center">
                            <p class="card-text" style="color:black; box-shadow: white">TERTIARY</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">$css</div>
                </div>
            </body>
        </html>
PAGE;

        return $html;
    }
?>
