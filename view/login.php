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

<!-- Show successful login message -->
  <?php
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
  ?>

  <form action="/phpmotors/accounts/" method="POST">
      <label for="clientEmail">Email</label>
      <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>

      <label for="clientPassword">Password</label><br>
      <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 

      <input name="clientPassword" id="clientPassword" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>

      <input id="login" type="submit" value="login">
      <input type="hidden" name="action" value="Login">
  </form>

  <a href="/phpmotors/accounts/index.php?action=register">Not a member yet?</a>

</div>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>