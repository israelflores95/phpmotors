<?php
    if ($_SESSION['clientLevel'] <= 1 && $_SESSION['loggedin']) {
        header('Location: ../index.php');
    }
  ?><?php
// Build dynamic classification dropdown list
$classList = '';
foreach ($classificationid as $classification) {
$classList .= "<option value='$classification[classificationId]'";
if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId) {
    $classList .= 'selected' ;
  }
}
 $classList .= ">$classification[classificationName]</option>";
}

?><!doctype html>
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
      <option id="blank-option" disabled selected value>--Choose car classification--</option>
      <?php echo $classList; ?>
    </select>
    
    <Label for="invMake">Make*</Label>
    <input type="text" id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> required>

    <Label for="invModel">Model*</Label>
    <input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required>

    <Label for="invDescription">Description</Label>
    <textarea id="invDescription" name="invDescription"  required><?php if(isset($invDescription)){echo $invDescription;}  ?></textarea>

    <Label for="invImage">invImage*</Label>
    <input type="text" id="invImage" name="invImage" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required>

    <Label for="invThumbnail">Thumbnail Path*</Label>
    <input type="text" id="invThumbnail" name="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required>

    <Label for="invPrice">Price*</Label>
    <input type="number" step="any" id="invPrice" name="invPrice" min="0" max="1000000" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required>

    <Label for="invStock">Stock*</Label>
    <input type="number" id="invStock" name="invStock" min="0" max="10000" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required>

    <Label for="invColor">color*</Label>
    <input type="text" id="invColor" name="invColor" maxlength="20" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required>

    <input id="addVehicle" type="submit" value="Add Vehicle">
    <input type="hidden" name="action" value="add-vehicle">
    </form>

  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>