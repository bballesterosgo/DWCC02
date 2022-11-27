<?php 
// OBSERVACION: este ejemplo esta echo con get para que se entienda mejor
// Despues pasaremos todo a POST
// IDEA BASICA: si php recibe varias variables

// agenda [Juan]=98633333, agenda [vanesa]=8344554,agenda[Luis]4124442424
//php nos construye un array de nombre agenda en $_GET (o $_POST)
//Estas lineas echo permiten ver como recibe php la informacion del URL
//

echo "<pre>Informe sobre variables recibidas:<br>";
var_dump ($_GET);
echo"</pre>";

//COMPROBAMOS SI YA HAY EN EL URL DESPUES DE ? VARIABLE AGENDA[]
if (isset($_GET['agenda'])) {
    //si es asi asignamos el array que construye php a partir del URL
    //a nuestra variable $almacenAgenda
} else  $almacenaAgenda = array();

?>

<!DOCTYPE html>

    <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAREA DAW02</title>
</head>

<body>
<?php
    //Lo primero que hacemos es recibir la cadena de variables y procesarla
    // es un nuevo envio? debemos guardar el nuevo envio en el almacenAgenda
    // para que el codigo que aparece en nuevo

    if (isset($_GET['enviar'])){
        $nombre = $_GET['nombre'];
        $telefono = $_GET['telefono'];
        $almacenaAgenda [$nombre] = $telefono;

            }



?>

<h3>AGENDA</h3>

<?php

//Mostramos los contactos de la agenda

if (count($almacenAgenda) !=0) {

    echo "<fieldset>";
    echo "<legend> Datos Agenda </legend>";

    foreach ($almacenAgenda as $nombre => $telefono) {
        echo "<input type='text' value='$nombre' size='18px' disabled class='agenda'>";
        echo "<input type='text' value='$telefono' size='18px' disabled class='agenda'><br>";

    }

        echo "</fieldset>";
}

?>

<!-- Creamos el formulario de introduccion de un nuevo contacto -->

<fieldset>
    <legend>Nuevo Contacto</legend>

    <form action="<?php echo $_SERVER ['PHP_SELF'];?>" method="get">
    <label for="campoNombre">Nombre:</label>
    <input type="text" id="campoNombre" name="nombre" maxlength="20" required><br/>
    <label for="campoTelefono">Teléfono:</label>
    <input type="text" id="campoTeléfono" name="Telefono" maxlength="10"><br/>

    <input type="submit" value="Añadir Contacto" name='enviar'/>
    <input type="reset" value="Limpiar Campos" />

 
    
<?php 

//Codigo para guardar en este formulario los datos recibidos hasta ahora
//Este trozo de codigo debe dentro del >form> para que cuando el usuario
// envie el formulario, tambien se remitan estos campos ocultos.
// Importante Codificar cada campo como
// agenda [<nombre>]=434423123
// para que cuando el navegador remita la cadena cgi con los datos, esta misma
// pagina cree un array de nombre "agenda" con esta informacion oculta
//
//
//

foreach ($almacenAgenda as $nombre => $telefono){
    echo "<input type='hidden' name=\" agenda[$nombre]\" value='$telefono'>";
}

?>

</form>
</fieldset>


</body>
    
</html>

