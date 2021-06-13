<?php
    if ($_SESSION['clientLevel'] <= 1 && $_SESSION['loggedin']) {
        header('Location: ../index.php');
    }
  ?><!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | Vehicle Management</title>

</head>

<body>
  <section class="content">
 
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

<section>
    <h2>Vehicle Management</h2>
        <ul>
            <li><a href = '/phpmotors/vehicles/index.php?action=addClassification'>Add Classification</a></li>
            <li><a href = '/phpmotors/vehicles/index.php?action=addVehicle'>Add Vehicle</a></li>
        </ul>
</section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>