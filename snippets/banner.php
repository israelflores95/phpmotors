<div id="banner">
    <img id = "logo" src="/phpmotors/images/site/logo.png" alt="PHP motors logo">
    <?php if (isset($_SESSION['bannerName'])) {echo $_SESSION['bannerName'];}

    if (!$_SESSION['loggedin']) {
    echo "<a href='/phpmotors/accounts/?action=Login'>My Account</a>";

    } else {
        echo "<a href = '/phpmotors/accounts/?action=sign-out'>Sign Out</a>";
    }
    ?>
</div>