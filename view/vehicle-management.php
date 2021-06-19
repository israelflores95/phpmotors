<?php
    if ($_SESSION['clientLevel'] < 2 && !$_SESSION['loggedin']) {
        header('Location: /phpmotors/');
        exit;
    }

    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
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
        
<?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?>

<noscript>
<p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
</noscript>

<table id="inventoryDisplay"></table>

</section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>

  <script src="../js/inventory.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>