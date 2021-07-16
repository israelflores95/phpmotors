<?php
if(!$_SESSION['loggedin']) {
  header('Location: /phpmotors/');
}
?><!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>Account Management | PHP motors</title>

</head>

<body>
  <section class="content">

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

<!-- Content starts here -->
  <section class="admin-content">
  <!-- Send user session data -->
  <?php if (isset($_SESSION['clientName'])) { echo $_SESSION['clientName'];} ?>
  <?php if (isset($_SESSION['clientLogin'])) { echo $_SESSION['clientLogin'];} ?>

  <!-- Display session message if needed -->
  <?php if (isset($_SESSION['message'])) { echo $_SESSION['message'];} ?>
  <?php if (isset($message)) { echo $message;} ?>

  <!-- Check client level -->
  <?php
    if ($_SESSION['clientData']['clientLevel'] > 1) {
      echo "<div id='admin-links'><h4>Please use the link below to continue vehicle managmenet.</h4>";
      echo "<p>Below is a link to vehicle management<br>
      Here you can add, update, and delete vehicles from invatory.<br>
      You will also find the abililty to manage classifications</p>";
      echo "<p><a href = '/phpmotors/vehicles/'>Vehicle Managment</a></div>";
    }
  ?>

  <h3 id="account-info"><a href = "/phpmotors/accounts/index.php?action=updateAccount">Update Account</a></h3>
  </section>

  <section class="my-reviews">
  <?php if (isset($reviewList)) { echo $reviewList;} ?>
  </section>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>