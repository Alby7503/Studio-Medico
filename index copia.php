<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Medico</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <!--Title-->
        <div class="text-center">
            <div style="background-color: cyan;width: 100%;height: 5rem;">
                <h1 class="text-primary">Studio Medico</h1>
            </div>
        </div>
        <br>
        <!--Images-->
        <div id="carousel" style=" width:100%; height: 500px !important;">
            <div id="indicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#indicators" data-slide-to="0" class="active"></li>
                    <li data-target="#indicators" data-slide-to="1"></li>
                    <li data-target="#indicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/doctors.jpeg" alt="doctors" height="500rem">
                        <div class="carousel-caption d-none d-md-block" style="color: black">
                            <h5>I nostri dottori</h5>
                            <p>Specialisti in vari campi a vostra disposizione</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/tool.jpeg" alt="tool" height="500rem">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/hospital.jpeg" alt="hospital" height="500rem">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Precedente</span>
                </a>
                <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Prossimo</span>
                </a>
            </div>
        </div>
        <br>
        <!--Contacts-->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Orari</h5>
                        <p class="card-text">Lunedì - Venerdì: 8:00 - 18:00</p>
                        <p class="card-text">Sabato: 8:00 - 12:00</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Contatti</h5>
                        <p class="card-text">Telefono: +39 042 7503402</p>
                        <p class="card-text">Email: <a href="mailto:studio.medico@amr.it" class="card-link">studio.medico@amr.it</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!--Schedule-->
        <div class="text-center justify-content-center">
            <h2 class="text-secondary">Vuoi prenotare un appuntamento?</h2>
            <br>
            <a class="btn btn-secondary" href="schedule.php" role="button">Prenota</a>
        </div>
    </div>
    <br>
    <style>
        .card {
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
        }
    </style>
</body>

</html>