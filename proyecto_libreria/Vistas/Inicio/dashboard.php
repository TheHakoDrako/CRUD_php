<hr />
<div class="card text-center">
    <div class="card-header text-start">
        Pagina de Inicio - Dashboard
    </div>
    <div class="card-body">
        <br />
        <h1 class="card-title">Bienvenido <?= $_SESSION['nombre_usuario'] ?></h1>
        <br />
        <p class="card-text">Esta es una aplicación tipo CRUD, usando las siguientes tecnologias:</p>
        <div class="card-text text-bg-dark">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./Publico/img/logo_php.png" style="margin:10px;padding: 10px;width: 266px;" alt="PHP">
                    </div>
                    <div class="carousel-item">
                        <img src="./Publico/img/logo_mysql.png" style="margin:10px;padding: 10px;width: 212px;" alt="mysql">
                    </div>
                    <div class="carousel-item">
                        <img src="./Publico/img/logo_vscode.png" style="margin:10px;padding: 10px;width: 150px;" alt="vscode">
                    </div>
                </div>
                <br />
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <br />
        <p class="card-text">Aqui he aplicado muchos temas vistos en diferente modulos del SENA en el curso de "Análisis y Desarrollo de Software" de la Ficha -> 2758330</p>
        <a href="https://zajuna.sena.edu.co/" target="_blank" class="btn btn-primary">SENA</a>
    </div>
    <div class="card-footer text-body-secondary">
        Creada por: Jeronimo Ramírez Mejía
    </div>
</div>