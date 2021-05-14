<!doctype html>
<html lang="en">
<head>


  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>

</head>

<body>
  <section class="content">
  <div id="banner">
      <img id = "logo" src="/phpmotors/images/site/logo.png" alt="PHP motors logo">
      <button>My Account</button>
    </div>
  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>
  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>