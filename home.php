<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="phpmotors/css/styles.css" media="screen"/>

    </head>

    <body>
        <section class="content">
        <!--php snippet for nav -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>
        <div>
            <h1>Welcome to PHP Motors!</h1>

            <p>
            <h2>DMC Delorean</h2>
            3 Cup holders<br>
            superman doors<br>
            Fuzzy dice!<br>
            </p>

            <button id="ownTodayBtn">Own Today!</button>
            <img id="carImg" src="phpmotors/images/delorean.jpg" alt="delorean car">

            <section>
                <div id="deloreanUpgrades">
                    <h4>Delorean Upgrades</h4>
                    <a href="#">Flux Capacitor</a>
                    <a href="#">Flame Decals</a>
                    <a href="#">Bumper Stickers</a>
                    <a href="#">Hub Caps</a>
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