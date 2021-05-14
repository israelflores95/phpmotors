<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/styles.css" media="screen"/>

    <title>PHPMotors | Home</title>

    </head>

    <body>
        <section class="content">
        <div id="banner">
            <img id = "logo" src="/phpmotors/images/site/logo.png" alt="PHP motors logo">
            <button>My Account</button>
        </div>

        <!--php snippet for nav -->
        <nav id="nav">
        <!-- <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?> -->
        <?php echo $navList; ?>
        </nav>


        <div>
            <h1>Welcome to PHP Motors!</h1>

        <section id="dmcDelorean">
            
            <h3>DMC Delorean</h3>
            3 Cup holders<br>
            superman doors<br>
            Fuzzy dice!<br>
        
            <button id="ownTodayBtn">Own Today!</button>
        </section>

            <img id="carImg" src="/phpmotors/images/delorean.jpg" alt="delorean car">

            <section id="doubleFlex">
           
                <div id="upgrades">
                <h4>Delorean Upgrades</h4>

                <section>
                <div>
                    <img src="/phpmotors/images/upgrades/flux-cap.png" alt="flux Capacitor">
                    <a href="#">Flux Capacitor</a>
                </div>

                <div>
                    <img src="/phpmotors/images/upgrades/flame.jpg" alt="Flames">
                    <a href="#">Flame Decals</a>
                </div>
                </section>

                <section>
                <div>
                    <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Hello world bumbper sticker">
                    <a href="#">Bumper Stickers</a>
                </div>

                <div>
                    <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hubcap">
                    <a href="#">Hub Caps</a>
                </div>
                </section>
                </div>

                <div>
                    <h4>DMC Delorean Reviews</h4>
                    <ul>
                        <li>"So fast its almost like traveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Marty McFly!" (5/5)</li>
                        <li>"The most futristic ride of our day." (4.5/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </div>
            </section>
        </div>
        <!--php snippet for footer -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </section>
    </body>

</html>