<!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | classifications</title>

</head>

<body>
  <section class="content">
 
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

  <section>
  <h1>Add Car Classification</h1>

  <?php
  if (isset($message)) {
  echo $message;
  }
  ?>

  <form class="addClassification"  method="POST" action="/phpmotors/vehicles/index.php">

    <label for="classificationName">Classification Name</label>
    <input type="text" id="classificationName" name="classificationName" maxlength="20" required>

    <input id="addClassification" type="submit" value="Add Classification">
    <input type="hidden" name="action" value="add-classification">
  </form>
  </section>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>