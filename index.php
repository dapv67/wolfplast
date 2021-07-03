<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css"
    />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div class="login">
      <div class="img">
        <img src="img/logo.png" alt="" />
      </div>
      <form action="includes/loguear.php" class="frmlogin" method="POST">
        <div class="field">
          <label class="label">Correo</label>
          <div class="control">
            <input class="input" type="email" name="email" />
          </div>
        </div>
        <div class="field">
          <label class="label">Contraseña</label>
          <div class="control">
            <input class="input" type="password" name="password" />
          </div>
        </div>
        <button class="btn-login" type="submit">Ingresar</button>
      </form>
      <div class="footer-terms">
        <a href="#">Terms</a>
        <a href="#">Privacy</a>
        <a href="#">Security</a>
        <a href="#">Contact</a>
      </div>
    </div>
  </body>
</html>
