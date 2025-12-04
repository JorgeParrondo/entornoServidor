<?php
include "dat/Cliente.php";

/**
 * Lee el fichero de clientes y lo carga en un array asociativo con clave DNI.
 * @return array<string, Cliente>
 */
function cargarTablaClientes(): array {
    $tabla = [];
    $path = __DIR__ . '/dat/clientes.csv';
    if (!file_exists($path)) {
        return $tabla; // fichero no existe -> tabla vacía
    }
    $fich = fopen($path, 'r');
    if (!$fich) {
        return $tabla;
    }
    while ($linea = fgetcsv($fich)) {
        // proteger si la línea está vacía o mal formada
        if (!isset($linea[0])) continue;
        $dni = $linea[0];
        $nombre = $linea[1] ?? '';
        $clavehash = $linea[2] ?? '';
        $puntos = isset($linea[3]) ? (int)$linea[3] : 0;
        $cli = new Cliente($dni, $nombre, $clavehash, $puntos);
        // usar el dni como clave para acceso directo
        $tabla[$dni] = $cli;
    }
    fclose($fich);
    return $tabla;
}

/**
 * Guarda la tabla asociativa de Clientes en el CSV.
 * @param array<string, Cliente> $tabla
 */
function salvarTablaClientes(array $tabla) {
    $path = __DIR__ . '/dat/clientes.csv';
    $fich = fopen($path, 'w');
    if (!$fich) return false;
    foreach ($tabla as $cli) {
        $tablaDatos = [$cli->dni, $cli->nombre, $cli->clavehash, $cli->puntos];
        fputcsv($fich, $tablaDatos);
    }
    fclose($fich);
    return true;
}

/**
 * Valida usuario y contraseña contra clientes.csv
 */
function validarCliente($dni, $clave): bool {
    $tabla = cargarTablaClientes();
    if (!isset($tabla[$dni])) {
        return false; // dni no encontrado
    }
    $cliente = $tabla[$dni];
    // suponemos que $cliente->clavehash contiene el hash guardado (password_hash)
    return password_verify($clave, $cliente->clavehash);
}

/**
 * Anota los puntos logrados en la última partida 
 */
function anotarPuntos($dni, $puntos): bool {
    $tabla = cargarTablaClientes();
    if (!isset($tabla[$dni])) {
        return false; // cliente no existe
    }
    // actualizar puntos (reemplaza o asigna)
    $tabla[$dni]->puntos = (int)$puntos;
    return salvarTablaClientes($tabla);
}


