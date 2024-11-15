<div class="container">
    <!-- Contenedor principal -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- Inicio del card -->
                <div class="card-header">
                    Iniciar sesión
                </div>
                <div class="card-body">
                    <!-- Inicio el cuerpo del form -->
                    <form action="<?= ruta('login', 'login') ?>" method="POST">
                        <div class="form-group">
                            <label for="emailUsuario">Email:</label>
                            <input name="emailUsuario" id="emailUsuario" type="email" class="form-control" placeholder="Ingresa tu correo." required>
                        </div>
                        <div class="form-group">
                            <label for="passwordUsuario">Contraseña:</label>
                            <input name="passwordUsuario" id="passwordUsuario" type="password" class="form-control" placeholder="Ingresa tu contraseña." required>
                        </div>
                        <button name="btn_login" type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin contenedor -->
</div>