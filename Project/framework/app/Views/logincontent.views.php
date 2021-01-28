<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Mitarbeiterbereich</title>
</head>
<body>
    <div class="background">

        <div class="container">

            <?php include 'app/Views/commons/header.commons.php' ?>

                <br>

                <!-- INSERT INTO `Orders` (`Firstname`,`Lastname`,`Email`,`Tel`,`Service`,`Priority`,`OrderDate`,`DeliverDate`) -->


                <article>
                    <legend>Bestellungen</legend>
                    <table class="table" name="orderlist" id="orderlist">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vorname</th>
                            <th scope="col">Nachname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Dienst</th>
                            <th scope="col">Priorität</th>
                            <th scope="col">Abholdatum</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php echo ordersdisplay(); ?>
                        </tbody>
                      </table>

                      <br>
                      <br>
                    
                      <legend>Bearbeitung</legend>
                      <table class="table" name="orderlist" id="orderlist">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Bestellung</th>
                              <th scope="col">Kunde</th>
                              <th scope="col">Mitarbeiter</th>
                              <th scope="col">Dienst</th>
                              <th scope="col">Abholdatum</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php echo usersdisplay(); ?>
                          </tbody>
                        </table>

                        <br>
                        <br>

                <form action='<?php htmlspecialchars('logincontent'); ?>' method="post" style="background-color: #ededed; padding: 1%;">
                    <div class="form-group">
                        <label for="staticUsername" class="col-sm-2 col-form-label">Mitarbeiter</label>
                        <div class="col-sm-2">
                          <input type="text" readonly class="form-control" id="staticUsername" value="<?php echo $_SESSION['username'] ?>">
                        </div>
                      </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="ordernum">Bestell. Nummer</label>
                        <input type="number" class="form-control" name="ordernum" id="ordernum" placeholder="#">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="oderstate">Dienst</label>
                        <select id="orderstate" name="orderstate" class="form-control">
                            <option selected value="0">Keine Veränderung</option>
                            <option value="Kleiner Service">Kleiner Service</option>
                            <option value="Grosser Service">Grosser Service</option>
                            <option value="Rennski-Service">Rennski-Service</option>
                            <option value="Bindung montieren und einstellen">Bindung montieren und einstellen</option>
                            <option value="Fell zuschneiden">Fell zuschneiden</option>
                            <option value="Heisswachsen">Heisswachsen</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="orderstate">Status</label>
                        <select id="orderstate" name="orderstate" class="form-control">
                            <option selected>Offen</option>
                            <option>In bearbeitung</option>
                            <option>Abgeschlossen</option>
                            <option>Storniert</option>
                        </select>
                    </div>
                </div>
                    <div class="mb-3">
                    <label for="Textarea" class="form-label" name="Textarealabel">Comment</label>
                    <textarea maxlength="500" class="form-control" id="Textarea" rows="3" name="Textarea" placeholder="Max. Length - 500 Characters"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary" value="Cancel">
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