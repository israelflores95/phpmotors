<!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | Add Vehicle</title>

</head>

<body>
  <section class="content">
 
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

  <section>
    <!-- headings for vehicles -->
  <h1>Add Vehicle</h1>
  <h4>*Note all fields are required</h4>

  <?php
  if (isset($message)) {
  echo $message;
  }
  ?>
    <!-- start form -->
    <form class="addVehicle" method="POST" action="/phpmotors/vehicles/index.php">

    <label for="classificationId" hidden>selectBox</label>
    <select id="classificationId" name="classificationId" required>
      <option disabled selected value>--Choose car classification--</option>
      <?php echo $classList; ?>
    </select>
    
    <Label for="invMake">Make*</Label>
    <input type="text" id="invMake" name="invMake" required>

    <Label for="invModel">Model*</Label>
    <input type="text" id="invModel" name="invModel" required>

    <Label for="invDescription">Description</Label>
    <textarea id="invDescription" name="invDescription"></textarea>

    <Label for="invImage">invImage*</Label>
    <input type="text" id="invImage" name="invImage" required>

    <Label for="invThumbnail">Thumbnail Path*</Label>
    <input type="text" id="invThumbnail" name="invThumbnail" required>

    <Label for="invPrice">Price*</Label>
    <input type="text" id="invPrice" name="invPrice" required>

    <Label for="invStock">Stock*</Label>
    <input type="text" id="invStock" name="invStock" required>

    <Label for="invColor">color*</Label>
    <input type="text" id="invColor" name="invColor" >

    <input id="addVehicle" type="submit" value="Add Vehicle">
    <input type="hidden" name="action" value="add-vehicle">
    </form>

  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>