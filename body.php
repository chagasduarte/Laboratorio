<div class="container" id="pagina">

    <div id="carouselExampleCaptions" class="carousel slide m-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Img/carrossel1.jpg" class="img-fluid carousel-img" alt="">
                <div class="carousel-caption">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Img/carrossel2.jpg" class="img-fluid carousel-img" alt="">
                <div class="carousel-caption">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Img/carrossel3.jpg" class="img-fluid carousel-img" alt="">
                <div class="carousel-caption">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleCaptions" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </a>
    </div>


    <div class="container">
        <div class="justify-content-center row">
            <div class="bg-yellow card card-body col-5 p-3 align-items-end">
                <img src="Img/card1.jpg" class="card-img p-0 mb-3 col-4">
                <div class="card-txt fg-red">
                    <h4>Promoção:<br>
                    Combo família!</h4>
                </div>
                <button class="btn btn-red col-3 float-right">Peça agora!</button>
            </div>
            <div class="bg-yellow card card-body col-5 p-3 align-items-end">
                <img src="Img/card1.jpg" class="card-img p-0 mb-3 col-4">
                <div class="card-txt fg-red">
                    <h4>Promoção:<br>
                    Combo dia dos namorados!</h4>
                </div>
                <button class="btn btn-red col-3 float-right">Peça agora!</button>
            </div>
        </div>
    </div>




<!--
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#consulta" aria-expanded="false" aria-controls="consulta"> consultar banco </button>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#insercao" aria-expanded="false" aria-controls="insercao"> inserir no banco</button>
    </p>

    <?php
    include 'Modelo/Mesa.php';
    $mesas = new Mesa();
    $mesa = $mesas->getMesa(1);
    ?>

    <div class="collapse" id="consulta" data-parent="#pagina">
        <div class="card card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">status</th>
                        <th scope="col">garçom</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo  $mesa["Id"]?></td>
                        <td><?php echo  $mesa["Id_Garcom"]?></td>
                        <td><?php echo  $mesa["Status"]?></td>
                        <td><?php echo  $mesa["Id_Pedidos"]?></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

    <div class="collapse" id="insercao" data-parent="#pagina">
        <div class="card card-body">
           insercao aqui
        </div>
    </div>
-->

</div>