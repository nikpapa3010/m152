<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Register</title>
</head>
<body>
  <div class="background">

    <div class="container">

      <?php include 'app/Views/commons/header.commons.php' ?>

        <br>

        <article>
          <h1>Registrierung</h1>
          <br>

          <?php if(count($errors) > 0) : ?>
            <ul class="alert alert-danger">
              <?php foreach($errors as $error) : ?>
                <li><?= $error ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <br>
          <form action='<?php echo htmlspecialchars('register'); ?>' method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">Vorname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Max" value="<?php echo $firstname ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Nachname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Mustermann" value="<?php echo $lastname ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="max.mustermann@domain.com" value="<?php echo $email ?>">
                <small id="emailHelp" class="form-text text-muted">Wir werden Ihre Email niemals mit anderen teilen</small>
              </div>
              <div class="form-group col-md-6">
                <label for="tel">Telefon</label>
                <input type="tel" class="form-control" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="123-456-78-90" value="<?php echo $tel ?>">
              </div>
            </div>

            <br>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dienste">Dienstleistungen</label>
                <select class="form-control" id="dienste" name="dienste">
                  <option value="Kleiner Service" <?php echo $dienste=="Kleiner Service"?"selected":""; ?>>Kleiner Service</option>
                  <option value="Grosser Service" <?php echo $dienste=="Grosser Service"?"selected":""; ?>>Grosser Service</option>
                  <option value="Rennski-Service" <?php echo $dienste=="Rennski-Service"?"selected":""; ?>>Rennski-Service</option>
                  <option value="Bindung montieren und einstellen" <?php echo $dienste=="Bindung montieren und einstellen"?"selected":""; ?>>Bindung montieren und einstellen</option>
                  <option value="Fell zuschneiden" <?php echo $dienste=="Fell zuschneiden"?"selected":""; ?>>Fell zuschneiden</option>
                  <option value="Heisswachsen" <?php echo $dienste=="Heisswachsen"?"selected":""; ?>>Heisswachsen</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="priority">Priorität</label>
                <select class="form-control" id="priority" name="priority">
                  <option value="1" <?php echo $dienste==1?"selected":""; ?>>Tief</option>
                  <option value="2" <?php echo $dienste==2?"selected":""; ?>>Standard</option>
                  <option value="3" <?php echo $dienste==3?"selected":""; ?>>Express</option>
                </select>
              </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Registrieren">
          </form>
        </article>

        <br>

        <?php include 'app/Views/commons/footer.commons.php' ?>

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      </div>
    </div>
  </body>
  </html>