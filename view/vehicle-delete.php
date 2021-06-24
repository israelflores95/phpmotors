<?php
    if ($_SESSION['clientLevel'] < 2 && !$_SESSION['loggedin']) {
        header('Location: ../index.php');
    }
  ?><!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title><?php if(isset($invInfo['invMake'])){ echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>

</head>

<body>
  <section class="content">

<!-- php banner snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav"><?php echo $navList; ?></nav>

  <section>
    <!-- headings for vehicles -->
    <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>

<p>Confirm Vehicle Deletion. The delete is permanent.</p>

  <?php
  if (isset($message)) {
  echo $message;
  }
  ?>
    <!-- start form -->
    <form class="addVehicle" method="POST" action="/phpmotors/vehicles/index.php">
    
    <Label for="invMake">Make*</Label>
      <input type="text" id="invMake" name="invMake" readonly <?php if(isset($invMake)){echo "value='$invMake'";} elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> >

    <Label for="invModel">Model*</Label>
      <input type="text" id="invModel" name="invModel" readonly <?php if(isset($invModel)){echo "value='$invModel'";} elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?>>

    <Label for="invDescription">Description</Label>
      <textarea id="invDescription" name="invDescription" readonly ><?php if(isset($invDescription)){echo $invDescription;} elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?></textarea>

    <input id="addVehicle" type="submit" value="Delete Vehicle">

    <input type="hidden" name="action" value="deleteVehicle">
    <input type="hidden" name="invId" value=" <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} ?>">

    </form>

  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>