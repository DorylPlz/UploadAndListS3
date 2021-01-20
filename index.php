<?php
    require 'start.php';
	$config = require('config.php');

    $objects = $s3->getIterator('ListObjects',[
        'Bucket' => $config['s3']['bucket']
    ]);
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="Upload.php" method="post" enctype="multipart/form-data">
            Selecciona el archivo a cargar:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="Cargar Archivo" id="submit">
        </form>
<hr>
        <table>
            <th>
                <tr>
                    <th>Nombre</th>
                    <!--<th>Link</th> -->
                </tr>
            </th>
            <tbody>
            <?php foreach($objects as $object): ?>
                <tr>
                    <td><?php echo $object['Key'];?></td>
                    <!--Link de descarga
                    <td><a href="<?php echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key']); ?>" download="<?php $object['Key']; ?>">Descarga</a></td> -->
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </body>
</html>