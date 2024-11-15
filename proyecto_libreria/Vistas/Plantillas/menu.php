<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Aplicacion de Libreria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Libros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= ruta("libros", "listadoLibros") ?>">Listado de libros</a></li>
            <li><a class="dropdown-item" href="<?= ruta("libros", "crearLibro") ?>">Crear libro</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= ruta("usuarios", "listadoUsuarios") ?>">Listado de usuarios</a></li>
            <li><a class="dropdown-item" href="<?= ruta("usuarios", "crearUsuario") ?>">Crear usuario</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ruta("inicio", "acercaDe") ?>">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= ruta("login", "logout") ?>">Salir</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>