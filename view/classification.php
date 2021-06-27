<!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>

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
    <h1 class="vehicle-heading"><?php echo $classificationName; ?> vehicles</h1>

    <!-- error message if needed -->
    <?php if(isset($message)){echo $message; } ?>

    <!-- Display vehicle list -->
    <?php if(isset($vehicleDisplay)){echo $vehicleDisplay;} ?>


  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>