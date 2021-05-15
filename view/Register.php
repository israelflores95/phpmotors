<!doctype html>
<html lang="en">
<head>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
  <title>PHP motors | Register</title>
</head>

<body>
  <section class="content">
 
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/banner.php'; ?>

  <!-- nav php snippet -->
  <nav id="nav">
  <?php echo $navList; ?>
  </nav>

<!--Start registration form-->

<div id="regForm">
  <h2>Register</h2>
  <form>
  
  <label for="clientFirstname">First Name</label>
  <input name="clientFirstname" id="clientFirstname" type="text" required>

  <label for="clientLastName">Last Name</label>
  <input name="clientLastName" id="clientLastName" type="text" required>
  
  <label for="clientEmail">Email</label>
  <input name="clientEmail" id="clientEmail" type="email" required>

  <p>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
  <label for="clientPassword">Password</label>
  <input name="clientPassword" id="clientPassword" type="password" required>


  <input id="signUp" name="register" type ="submit" value="Sign up">
  </form>

  <button id = "showPass" onclick="showPass()">Show Password</button>
</div>

  <!-- footer php snippet -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 

   <script>
    function showPass() {
      var x = document.getElementById("clientPassword");
        if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
        }
    return false;
      
    }
   </script>
  </section>
</body>
</html>