<div class="container text-center" style="padding: 20px 20px 0px;">
    <h1 style="margin:0px">Crear usuario</h1>
</div>
<hr />
<div>
    <form method="POST" action="./?controlador=usuarios&accion=crearUsuario">
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" aria-describedby="nombre" required>
            <div id="nombreUsuario" class="form-text">Elige un nombre de usuario adecuado.</div>
        </div>
        <div class="mb-3">
            <label for="emailUsuario" class="form-label">Correo:</label>
            <input type="email" class="form-control" name="emailUsuario" id="emailUsuario" aria-describedby="correo" required>
            <div id="emailUsuario" class="form-text">Elige un correo para tu usario.</div>
        </div>
        <div class="mb-3">
            <label for="passwordUsuario" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="passwordUsuario" id="passwordUsuario" aria-describedby="contraseña" required>
            <div id="passwordUsuario" class="form-text">Elige una contraseña que recuerdes para tu usuario.</div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-success" name="btn_agregar_usuario">Agregar usuario</button>
            <a class="btn btn-outline-dark" href="./?controlador=usuarios&accion=listadoUsuarios">Cancelar</a>
        </div>
    </form>
</div>