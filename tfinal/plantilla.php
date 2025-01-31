<?php
// Incluir el archivo de conexión (si es necesario)
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Estudiantes filtrado por nombre</title>
    

   
</head>
<body>


<?php
// Código en PHPli.
?>
                <form action="almacenarconsulta.php" method="POST">
                    <div >
                        <label for="nombre">Insertar nombre de alumno</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre " required>
                    </div>
                    <div >
                    <label for="edad">Insertar edad del alumno</label>
                    <input type="number" id="edad" name="edad" placeholder="Introduce la edad" min="15" max="99" required>

                    </div>
                    <div >
                        <label for="curso">Insertar el curso del alumno</label>
                        <select name="curso" id="curso">
                            <option value="asir1">asir1</option>
                            <option value="asir2">asir2</option>
                            <option value="Daw1">Daw1</option>
                            <option value="Daw2">Daw2</option>
                        </select>
                    </div>
                    <div >
                        <label for="promociona">Promociona el Alumno:</label>
                        <select name="promociona" id="promociona">
                            <option value="si">si</option>
                            <option value="no">no</option>
                        
                        </select>
                    </div>
                    <button type="submit" name="Insertar">Crear</button>
                    <button type="submit" name="Borrar">Borra</button>
                </form>



</body>
</html>