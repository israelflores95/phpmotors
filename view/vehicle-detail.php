<!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>Detailed | PHP motors</title>

</head>

<body>
  <section class="content">
 
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

<!-- Content starts here -->

  <section class="detailed-view">
  <!-- Display detail vehicle information here -->
  <?php if (isset($vehicleDetailDisplay)) { echo $vehicleDetailDisplay;} ?>
  

  </section>
<hr>
  <section class="reviews">
    <h2>reviews</h2>

    <!-- Check if user is logged in to add review -->
    <?php
    if (!isset($_SESSION['loggedin'])) {
        echo '<p>A review can be added by "logging in" </p>';
        echo '<a href="../accounts/index.php?action=Login">Click here to log in</a>';
    }

    // create review form
    if (isset($reviewForm)) { echo $reviewForm;}

    // add existing reviews
    if (isset($reviewList)) { echo $reviewList;}
    ?>

  </section>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>