<?php
if(!$_SESSION['loggedin']) {
  header('Location: /phpmotors/');
}
?><!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | Templates</title>

</head>

<body>
  <section class="content">

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

<!-- Content starts here -->
  <section>
  <!-- Send user session data -->
  <?php if (isset($_SESSION['clientName'])) { echo $_SESSION['clientName'];} ?>
  <?php if (isset($_SESSION['clientLogin'])) { echo $_SESSION['clientLogin'];} ?>

  <!-- Check client level -->
  <?php
    if ($_SESSION['clientData']['clientLevel'] > 1) {
      
      echo "<p>Click <a href = '/phpmotors/vehicles/'>here</a> to continue";
    }
  ?>
  </section>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>