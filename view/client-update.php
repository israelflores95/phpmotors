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
    if (isset($accountMessage)) {
    echo $accountMessage;
    }
  ?>

  <!-- client update form -->
    <form class="updateClient-info" method="POST" action="/phpmotors/accounts/index.php">

    <label for="clientFirstname">First name</label>
    <input type="text" id="clientFirstname" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} elseif(isset($_SESSION['clientData']['clientFirstname'])) {echo "value='".$_SESSION['clientData']['clientFirstname']."'"; }  ?> required>
    

    <label for="clientLastname">Last name</label>
    <input type="text" id="clientLastname" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} elseif(isset($_SESSION['clientData']['clientLastname'])) {echo "value='".$_SESSION['clientData']['clientLastname']."'"; } ?> required>
    

    <label for="clientEmail">Email</label>
    <input type="email" id="clientEmail" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} elseif(isset($_SESSION['clientData']['clientEmail'])) {echo "value='".$_SESSION['clientData']['clientEmail']."'"; }  ?> required>
    

    <button type="submit" name="submit" value="Update User">Update Info</button>
    <!-- Add the action name - value pair -->
    <input type="hidden" name="action" value="update-account">
    <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData'])){ echo $_SESSION['clientData']['clientId']; } ?>">
    </form>

  <!-- change client password form -->
  <h2>Change password here</h2>

  <?php
    if (isset($passMessage)) {
    echo $passMessage;
    }
  ?>
  <br>
  <p>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
    <form class="updateClient-password" method="POST" action="/phpmotors/accounts/index.php">

      <label for="clientPassword">Change Password</label>
      <input name="clientPassword" id="clientPassword" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>

      <input id="update-password" type="submit" value="Update Password">

      <input type="hidden" name="action" value="update-password"> 
      <input type="hidden" name="clientId" <?php if (isset($_SESSION['clientData']['clientId'])) { echo "value=" . $_SESSION['clientData']['clientId'];} ?>>
    </form>

  </section>


  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
   
  </section>
</body>
</html>