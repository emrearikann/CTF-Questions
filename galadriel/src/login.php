<?php
session_start();
include("./database.php");

try {
   if (isset($_POST["username"]) && isset($_POST["password"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      if (empty($username) || empty($password)) {
         $message = "All fields must be filled!";
         echo "<script type='text/javascript'>
                   alert('$message');
                   window.location.href='./login.php';
               </script>";
         exit();
      }

      $q = $db->prepare("SELECT * FROM users WHERE username = ?");
      $q->execute([$username]);
      $user = $q->fetch();

      if ($user && $user['password'] === $password) {
         $_SESSION["username"] = $user["username"];
         $_SESSION["logged"] = true;
         header("Location: ./index.php");
         exit();
      } else {
         $message = "Username or password is incorrect!";
         echo "<script type='text/javascript'>
                   alert('$message');
                   window.location.href='./login.php';
               </script>";
         exit();
      }
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="./style/pico.min.css" />
</head>

<body>
   <article style="margin-top: 8rem;">
      <div class="container" style="width: 20rem; text-align: center;">
         <form action="#" method="POST" id="aHR0cHM6Ly9naXRodWIuY29tL2RhbmllbG1pZXNzbGVyL1NlY0xpc3RzL2Jsb2IvbWFzdGVyL1Bhc3N3b3Jkcy9Db21tb24tQ3JlZGVudGlhbHMvbWVkaWNhbC1kZXZpY2VzLnR4dA==">
            <hgroup style="text-align: center;">
               <h3 style="padding-bottom: .5rem; text-align: center;">L O G I N</h3>
               <h6 style="padding-bottom: .5rem; text-align: center;">username: user<br />password: ?</h6>
            </hgroup>
            <input id="username" type="text" autocomplete="off" placeholder="Username" name="username" />
            <input id="password" type="password" autocomplete="off" placeholder="Password" name="password" />
            <button type="submit" style="padding: 0.4rem">Login</button>
         </form>
      </div>
   </article>
</body>

</html>