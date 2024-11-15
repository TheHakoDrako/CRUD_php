<div class="container text-center" style="padding: 20px 20px 0px;">
  <h1 style="margin:0px">Listado de usuarios</h1>
</div>
<hr />
<div class="container text-center">
  <?= crearLink("Registrar usuario", [
    "controlador" => "usuarios",
    "accion" => "crearUsuario",
    "opcionesHtml" => [
      "class" => "btn btn-outline-success"
    ]
  ])
  ?>
</div>
<br/>
<!-- Filtros de búsqueda -->
<form class="card" style="width: 48rem;" action="<?= ruta('usuarios', 'listadoUsuarios') ?>" method="POST">
  <div class="card-header">
    Filtros de búsqueda:
  </div>
  <div class="class card-body">
    <div class="class row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Filtrar por 'ID'" name="id" value="<?= $filtros['name'] ?? ''?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Filtrar por 'nombre'" name="name" value="<?= $filtros['name'] ?? ''?>">
      </div>
      <div class="col">
        <input type="email" class="form-control" placeholder="Filtrar por 'email'" name="email" value="<?= $filtros['email'] ?? ''?>">
      </div>
      <div class="col">
        <button class="btn btn-primary" name="btn_filtrar" type="submit">
          Filtrar
        </button>
      </div>
    </div>
  </div>
</form>
<hr />
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $usuario): { ?>
        <tr>
          <th scope="row"><?= $usuario['ID'] ?></th>
          <td><?= $usuario['name'] ?></td>
          <td><?= $usuario['email'] ?></td>
          <td><?= $usuario['password'] ?></td>
          <td> <?= crearLink("Editar", [
                  "controlador" => "usuarios",
                  "accion" => "editarUsuario",
                  "parametros" => [
                    "id" => $usuario['ID']
                  ],
                  "opcionesHtml" => [
                    "class" => "btn btn-outline-primary btn-sm"
                  ]
                ])
                ?>
            <?= crearLink("Eliminar", [
              "controlador" => "usuarios",
              "accion" => "eliminarUsuario",
              "parametros" => [
                "id" => $usuario['ID']
              ],
              "opcionesHtml" => [
                "class" => "btn btn-outline-danger btn-sm"
              ]
            ])
            ?>
          </td>
        </tr>
    <?php }
    endforeach; ?>
  </tbody>
</table>