<?php
session_start();
include_once ('../../app/funciones.php');
if(!isset($_SESSION['administrador'])){
    session_unset();
    session_destroy();
    header("Location: /php/DisenoWEB-main/index.php");
    exit();
}
// Control de sesion
controlInteraccion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? null;
    switch ($accion) {
        case "añadir":
            $NewUsuario = definirNewNot();
            validarAddNot($NewUsuario);
            header("Location: admNoticias.php");
            exit;
            break;
        case "eliminar":
            $usuario = definirNot();
            validarDelNot($usuario);
            header("Location: admNoticias.php");
            exit;
            break;
        /*
        case "editar":
            $usuario    = definirUsr();
            $newUsuario = definirNewUsr();
            validarEditUser($usuario, $newUsuario);
            break;
        */
    }
}

// Definir usuario, a partir de la tabla generada
function definirNot() {
    $noticia = new Noticia();
    $noticia->id = trim($_POST['noticiaTabla'] ?? '');
    return $noticia;
}

// Definir usuario, a partir de los datos introducidos
function definirNewNot() {
        $noticia = new noticia();
        $noticia->titulo = trim($_POST['NewTitulo'] ?? '');
        $noticia->autor = $_POST['NewAutor'];
        $noticia->contenido = $_POST['NewContenido'];
        return $noticia;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../web/IMG/favicon.png">
    <title>TetuScores</title>
    <link rel="stylesheet" href="../../web/CSS/default.css"/>
    <link rel="stylesheet" href="../../web/CSS/adm/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="nav">
        <div id="logo">
            <a href="administrador.php"><img src="../../web/IMG/Logo1.png" alt="Logo" width="200px"></a>
        </div>
        <ul id="nav-list">
            <li><a href="admLiga.html">Liga</a></li>
            <li><a href="admNoticias.php">Noticias</a></li>
            <li><a href="admUsuarios.php">Usuarios</a></li>
        </ul>
    </div>

<!-- Contenedor principal de todo el contenido de la página -->
    <div id="content">
        <div id="content-table">
            <div id="content-header">
            <h1>Panel de Administrador de Noticias</h1>
            <div id="inputs-header">
                <input type="search" id="search-bar" class="search-bar" value="Search">
                <ul class="menu-order">
                    <li class="menu-order menu-order-dropdown">
                        <a href="#" class="menu-link">
                            <span>Ordenar</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#" class="sub-menu-item">Por fecha</a></li>
                            <li><a href="#" class="sub-menu-item">Por titulo</a></li>
                            <li><a href="#" class="sub-menu-item">Por autor</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- MODAL AÑADIR -->
            <div id="modal-add" class="modal">
                <div class="modal-content">
                    <h2>Añadir noticia</h2>
                    <form class="modal-form" method="post">
                        <input type="hidden" name="accion" value="añadir">
                        <input type="text" name="NewTitulo" placeholder="Titulo">
                        <input type="text" name="NewAutor" placeholder="Autor">
                        <input type="text" name="NewContenido" placeholder="Contenido">
                        <div class="modal-actions">
                            <input type="reset" class="close-modal" value="Cancelar"></button>
                            <input type="submit" class="confirm" value="Añadir">
                        </div>
                    </form>
                </div>
            </div>

            <!-- MODAL ELIMINAR -->
            <div id="modal-del" class="modal">
                <div class="modal-content">
                    <h2>Eliminar noticia</h2>
                    <p>¿Estás seguro de que quieres eliminar esta noticia?</p>
                    <form class="modal-form" method="post">
                        <input type="hidden" name="accion" value="eliminar">
                        <div class="modal-actions">
                            <input type="reset" class="close-modal" value="Cancelar">
                            <input type="submit" class="confirm" value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>

            <!-- MODAL EDITAR -->
            <!--
            <div id="modal-edit" class="modal">
                <div class="modal-content">
                    <h2>Editar usuario</h2>
                    <form class="modal-form" method="post">
                        <input type="hidden" name="accion" value="editar">
                        <input type="hidden" name="usuario" id="edit-usuario">

                        <input type="text" name="NewUsuario" id="edit-nombre">
                        <input type="email" name="NewEmail" id="edit-email">
                        <input type="text" name="NewContraseña" id="edit-passwd">

                        <div class="modal-actions">
                            <input type="reset" class="close-modal" value="Cancelar">
                            <input type="submit" class="confirm" value="Guardar Cambios">
                        </div>
                    </form>
                </div>
            </div>
            -->
        </div>
        <div class="contenido">
            <?= mostrarNoticiasAdmin() ?>  
            <div class="table-actions">
                <a id="modal-btn-add"><i class='bx bx-plus-circle'></i> Añadir Nueva Noticia</a>
            </div>
        </div>
    </div>
    <script src="../../web/JS/AdmNoticia.js" defer></script>
</body>
</html>