<?php
if(!$_SESSION['loggedin']) {
  header('Location: /phpmotors/');
}
?><!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | Update account</title>

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

  <!-- Change client info form -->

  <h2>Update account information here</h2>

  <!-- Display php error if needed -->
  <?php
    if (isset($message)) {
    echo $message;
    }
  ?>

  <!-- client update form -->
    <form class="updateClient-info">
      <label for="clientFirstname">First Name</label>
      <input name="clientFirstname" id="clientFirstname" type="text" required <?php if (isset($_SESSION['clientData']['clientFirstname'])) { echo "value=" . $_SESSION['clientData']['clientFirstname'];} ?>>

      <label for="clientLastname">Last Name</label>
      <input name="clientLastname" id="clientLastname" type="text" required <?php if (isset($_SESSION['clientData']['clientLastname'])) { echo "value=" . $_SESSION['clientData']['clientLastname'];} ?>>

      <label for="clientEmail">Email</label>
      <input name="clientEmail" id="clientEmail" type="email" required <?php if (isset($_SESSION['clientData']['clientEmail'])) { echo "value=" . $_SESSION['clientData']['clientEmail'];} ?>>

      <input id="update-account" type="submit" value="Update Account">
      <input type="hidden" name="action" <?php if (isset($_SESSION['clientData']['clientId'])) { echo "value=" . $_SESSION['clientData']['clientId'];} ?>>
    </form>

  <!-- change client password form -->
  <h2>Change password here</h2>

  <?php
    if (isset($message)) {
    echo $message;
    }
  ?>
  
  <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
    <form class="updateClient-password">
      <label for="clientPassword">Change Password</label>
      <input name="clientPassword" id="clientPassword" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

      <input id="update-password" type="submit" value="Update Password">
      <input type="hidden" name="action" <?php if (isset($_SESSION['clientData']['clientId'])) { echo "value=" . $_SESSION['clientData']['clientId'];} ?>>
    </form>

  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>