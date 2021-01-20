<?php
    require 'start.php';
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="Upload.php" method="post" enctype="multipart/form-data">
            Selecciona el archivo a cargar:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="Cargar Archivo" id="submit">
        </form>

        <table>
            <th>
                <tr>
                    <th>Nombre</th>
                    <th>Link</th>
                </tr>
            </th>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>