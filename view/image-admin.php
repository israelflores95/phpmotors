<?php
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
}
?><!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>Image Management | PHP motors</title>

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
    <h2>Add New Vehicle Image</h2>
    <?php if (isset($message)) { echo $message;} ?>

    <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
    <label for="invItem">Vehicle</label>
      <?php echo $prodSelect; ?>
      <fieldset>
        <label>Is this the main image for the vehicle?</label>

        <label for="priYes" class="pImage">Yes</label>
        <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">

        <label for="priNo" class="pImage">No</label>
        <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">

      </fieldset>
    <label>Upload Image:</label>
    <input type="file" name="file1">
    <input type="submit" class="regbtn" value="Upload">
    <input type="hidden" name="action" value="upload">
    </form>
    
    <hr>
      <h2>Existing Images</h2>
      <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
      
      <?php if (isset($imageDisplay)) { echo $imageDisplay;} ?>

  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>

<?php unset($_SESSION['message']); ?>
</html>