<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="regbej.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Tune Tracer</title>
      <script src="https://kit.fontawesome.com/1bf196f23e.js" crossorigin="anonymous"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
      <!-- Bejelentkezés és Regisztráció -->
    <div class="wrapper">
      <a href="index.html"><span class="icon-close"><ion-icon name="close"></ion-icon></span></a>

      <div class="form-box login">
            <h2>Bejelentkezés</h2>
            <form action="login.php" method="post">
                  <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                  <?php } ?>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="pass" required>
                        <label>Jelszó</label>
                  </div>
                  <div class="remember">
                        <label><input type="checkbox" name="remember">Emlékezz rám</label>
                        <i><a href="elfelejtettjelszo.html">Elfelejtetted a jelszavad?</a></i>
                  </div>
                  <button type="submit" class="btn">Bejelentkezés</button>
                  <div class="login-register">
                        <p>Nincs fiókod?<a href="#" class="register-link" style="margin-left: 6px;"><b><i>Regisztráció</i></b></a></p>
                  </div>
            </form>
      </div>

      <div class="form-box register">
            <h2>Regisztráció</h2>
            <form action="register.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" name="name" required>
                        <label>Felhasználónév</label>
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="pass" required>
                        <label>Jelszó</label>
                  </div>
                  <div class="remember">
                        <label><input type="checkbox" required>Elfogadok mindent</label>
                  </div>
                  <button type="submit" class="btn">Regisztráció</button>
                  <div class="login-register">
                        <p>Van már fiókod?<a href="#" class="login-link" style="margin-left: 6px;"><b><i>Bejelentkezés</i></b></a></p>
                  </div>
            </form>
      </div>
  </div>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
            var wrapper = document.querySelector(".wrapper");
            var loginLink = document.querySelector(".login-link");
            var registerLink = document.querySelector(".register-link");

            registerLink.addEventListener('click', ()=> {
                wrapper.classList.add('active');
            });
            loginLink.addEventListener('click', ()=> {
                wrapper.classList.remove('active');
            });
      });
  </script>
</body>
</html>