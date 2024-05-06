<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>
    <link rel="stylesheet" href="Estilo_Inicio.css">
    <style>
        /* Estilos CSS adicionales */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <h1>Sistema de Citas Médicas</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="citas/citas.php">Administrar citas</a></li>
                <li><a href="pacientes/pacientes.php">Administrar pacientes</a></li>
                <li><a href="pagos/pagos.php">Administrar pagos</a></li>
                <li><a href="facturas/facturas.php">Administrar facturas</a></li>
                <li><a href="medicos/medicos.php">Administrar medicos</a></li>
                <li><a href="seguros/seguros.php">Administrar seguros</a></li>
                <li><a href="especialidad/especialidad.php">Administrar especialidades</a></li>
            </ul>
        </nav>
    </div>
    <main>
<h1 class="titulo">Agregar Especialidad</h1>

<?php

require "../conexion.php";
    $mysqli = connect(); 

echo '<form action="guardaresp.php"method="POST">';
                            echo '<label>Nombre de la especialidad</label>';
                            echo '<input type="text" name="nEsp" value=""><br>';
                            echo '<input type="submit" name="Enviar" value="Enviar" class="boton">';
                            echo '</form>';