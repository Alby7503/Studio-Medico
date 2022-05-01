<?php
require_once 'utility.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Medico</title>
    <?php bootstrap(); ?>
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
        <div id="carouselCaptions" class="carousel slide" data-bs-ride="carousel" data-bs>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/doctors.jpeg" class="d-block w-100" alt="dottori" height="500rem">
                    <div class="carousel-caption d-none d-md-block" style="color: red;">
                        <h5>I nostri dottori</h5>
                        <p>Personale altamente specializzato in vari settori</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/tool.jpeg" class="d-block w-100" alt="strumento" height="500rem">
                    <div class="carousel-caption d-none d-md-block" style="color: black;">
                        <h5>Strumenti professionali</h5>
                        <p>Con quello che ci sono costati...</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/hospital.jpeg" class="d-block w-100" alt="ospedale" height="500rem">
                    <div class="carousel-caption d-none d-md-block" style="color: cyan;">
                        <h5>La nostra struttura</h5>
                        <p>Equipaggiata per il vostro comfort</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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
                        <p class="card-text">Telefono: <a href="tel:+06427503">+06 42 7503</a></p>
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