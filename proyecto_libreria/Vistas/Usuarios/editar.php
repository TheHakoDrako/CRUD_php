<div class="container text-center" style="padding: 20px 20px 0px;">
    <h1 style="margin:0px">Editar: <?= $usuario['name'] ?> (#<?= $usuario['ID'] ?>)</h1>
</div>
<hr />
<div>
    <form method="POST" action="<?= ruta("usuarios", "editarUsuario", ["id" => $usuario['ID']]) ?>">
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" aria-describedby="nombre" value="<?= $usuario['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="emailUsuario" class="form-label">Correo:</label>
            <input type="email" class="form-control" name="emailUsuario" id="emailUsuario" aria-describedby="correo" value="<?= $usuario['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="passwordUsuario" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="passwordUsuario" id="passwordUsuario" aria-describedby="contraseña" value="<?= $usuario['password'] ?>" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-success" name="btn_actualizar_usuario">Actualizar usuario</button>
            <a class="btn btn-outline-dark" href="./?controlador=usuarios&accion=listadoUsuarios">Cancelar</a>
        </div>
    </form>
</div>