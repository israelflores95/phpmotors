<!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | Login</title>
</head>

<body>
  <section class="content">

  <!-- banner snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?> 

  <!-- nav php snippet -->
  <nav id="nav">
    <?php echo $navList; ?>
  </nav>

<div id="formContainer">
<h2>Sign in</h2>

  <form>
      <label for="clientEmail">Email</label>
      <input name="clientEmail" id="clientEmail" type="email">

      <label for="clientPassword">Password</label>
      <input name="clientPassword" id="clientPassword" type="password">

      <input id="login" type="submit" value="Login">
  </form>

  <a href="/phpmotors/accounts/index.php?action=register">Not a member yet?</a>

</div>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>