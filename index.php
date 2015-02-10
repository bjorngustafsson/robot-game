<!DOCTYPE html>
<html>
<head>
    <title>Robot Game</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div class="container">

    <div class="row header-plate">
        <div class="col-md-3 col-md-offset-6 packages ">
            <span id="packagecounter">Antal Paket: 0</span>

        </div>
        <div class="col-md-3 timer">
            <span id="seconds">Tid kvar:</span>
        </div>
    </div>

    <div class="rack1">
        <img src="img/rack.png" alt="Rack">
    </div>

    <div class="rack2">
        <img src="img/rack.png" alt="Rack">
    </div>

    <div class="bag">
        <img class="bag-image" src="img/bag-empty.png" alt="Bag">
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1 popup-window-basic col-centered">

            <p>Starta spelet genom att klicka start, du ska samla så
                många varor som möjligt på 10 sekunder genom att dra dem till kartongen nedanför.
                Det finns 2 varor på varje plats och totalt 20 varor.
                Roboten kommer att försöka störa dig men ju fler varor du plockar desto lugnare
                och gladare blir han.</p>
            <button id="start-game">Start</button>
        </div>

    </div>

    <div class="products-first-rack">
        <div><img src="img/product-100-whey.png" alt="product"></div>
        <div><img src="img/product-bcaa.png" alt="product"></div>
        <div><img src="img/product-creative-pyruvate.png" alt="product"></div>
        <div><img src="img/product-mutant-mass.png" alt="product"></div>
        <div><img src="img/product-mutant-mass.png" alt="product"></div>
    </div>

    <div class="products-first-rack">
        <div><img src="img/product-100-whey.png" alt="product"></div>
        <div><img src="img/product-bcaa.png" alt="product"></div>
        <div><img src="img/product-creative-pyruvate.png" alt="product"></div>
        <div><img src="img/product-mutant-mass.png" alt="product"></div>
        <div><img src="img/product-mutant-mass.png" alt="product"></div>
    </div>

    <div class="products-second-rack">
        <div><img src="img/product-100-whey.png" alt="100"></div>
        <div><img src="img/product-bcaa.png" alt="bcaa"></div>
        <div><img src="img/product-creative-pyruvate.png" alt="creative-pyruvate"></div>
        <div><img src="img/product-mutant-mass.png" alt="mutant"></div>
        <div><img src="img/product-mutant-mass.png" alt="mutant"></div>
    </div>

    <div class="products-second-rack">
        <div><img src="img/product-100-whey.png" alt="100"></div>
        <div><img src="img/product-bcaa.png" alt="bcaa"></div>
        <div><img src="img/product-creative-pyruvate.png" alt="creative"></div>
        <div><img src="img/product-mutant-mass.png" alt="mutant"></div>
        <div><img src="img/product-mutant-mass.png" alt="mutant"></div>
    </div>

    <div class="robot">
        <img class="imgrobot" src="img/robot-angry.png" alt="Robot">
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-2 timeup-window-basic">

            <!-- Nested row -->
            <div class="row">

                <div class="col-md-3 result-text">
                    <h3>Some result text</h3>
                </div>

                <div class="col-md-5 result-input">
                    <form action="process.php" method="POST">

                        <div id="name-group">
                            <label for="name">Namn:</label>
                            <input required = "required" type="text" id="name">
                        </div>

                        <div id="email-group">
                            <label for="email">Email:</label>
                            <input required = "required" type="text" id="email">
                        </div>

                        <div>
                            <p><input type="checkbox" required name="terms">Acceptera villkoren
                            <p>
                        </div>

                        <button type="submit">Send</button>

                    </form>
                </div>
            </div><!-- Nested row -->
        </div><!-- timeup-window-basic -->
    </div><!-- row -->


    <div class="row ">

        <div class="popup-window-toplist col-md-10 col-md-offset-2">
            <div class="result-content">
                <h2>Topplista</h2>
                <table class="results">
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="restart-and-invite col-md-10 col-md-offset-1">
            <div id="fb-root"> </div>
            <button id="restart-game" type="button" onClick="window.location.reload();">Försök igen</button>
            <button type="button" id="share">Dela på FB</button>

        </div>
    </div>

</div> <!-- container -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/bootbox.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/robot.js"></script>

<script src="http://connect.facebook.net/en_US/all.js"></script>

</body>
</html>