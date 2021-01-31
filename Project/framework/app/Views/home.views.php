<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>
    <div class="background">

        <div class="container">

            <?php include 'app/Controllers/HeaderController.php' ?>

            <br>

            <div class="row">

                <div class="col-lg-7">
                    <article class="overflow-auto">
                        <h1>Neuester Artikel</h1>

                        <br>

                        <?php echo $user->latestarticle(); ?>
                    </article>
                </div>

                <div class="col-lg-5">
                    <article class="overflow-auto">
                        <h3>Vorherige Artikel</h3>

                        <br>


                        <?php echo $user->lastarticles(); ?>
                    </article>
                </div>

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