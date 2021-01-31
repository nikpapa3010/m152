<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Social</title>
</head>
<body>
    <div class="background">

        <div class="container">

            <?php include 'app/Controllers/HeaderController.php' ?>

            <br>

            <article>

                <?php errordisplay($errors); ?>

                <div class="d-flex justify-content-center">
                    <form action="<?php echo htmlspecialchars('login'); ?>" method="post">
                        <h1>Login</h1>
                        <br>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter Username" value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Login">
                        <input type="reset" class="btn btn-secondary">
                    </form>
                    <br>
                </div>



                <div class="d-flex justify-content-center">
                    <br>
                    <form action="<?php echo htmlspecialchars('login'); ?>" method="post">
                        <br>
                        <br>
                        <h1>Registrieren</h1>
                        <br>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="username" id="username" placeholder="Enter Username" value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="password">Passwort</label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo $email ?>">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Register">
                        <input type="reset" class="btn btn-secondary" value="Cancel">
                    </form>
                </div>
            </article>
        </div>

        <br>

        <?php include 'app/Views/commons/footer.commons.php' ?>

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </div>

</div>
</body>
</html>