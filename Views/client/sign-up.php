<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up User</title>
    <link rel="stylesheet" href="../../views/css/style.css">
    <script type="text/javascript" src="../../views/js/jquery-3.4.1.min.js" charset="utf-8"></script>
  </head>
  <body>
    <header>
      <h1 id="title-header">Simulador Bancario</h1>
      <nav>
        <ul>
          <li><a href="sign_in.php">sign in</a></li>
        </ul>
      </nav>
    </header>
    <h1 id="title-body">Sign up</h1>
    <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <div class="input-form">
        <label for="">nombre</label>
        <input type="text" name="name" value="" placeholder="Tu nombre" required>
      </div>
      <div class="input-form">
        <label for="identification">cedula</label>
        <input type="number" name="identification" value="" placeholder="Numero de identificación" required>
      </div>
      <div class="input-form">
        <label for="">celular</label>
        <input type="number" name="cellphone" value="" placeholder="celular" required>
      </div>
      <div class="input-form">
        <label for="">password</label>
        <input type="password" name="password" value="" placeholder="password" required>
      </div>
      <div class="input-form">
      <button class="botones" type="submit" name="button">Registrar </button>
      </div>
    </form>
  </body>
</html>