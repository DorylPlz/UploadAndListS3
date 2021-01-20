<?php
    require 'start.php';
	$config = require('config.php');

    $objects = $s3->getIterator('ListObjects',[
        'Bucket' => $config['s3']['bucket']
    ]);
?>

<!DOCTYPE html>
<html>
<head>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>
    <body>
        <form action="Upload.php" method="post" enctype="multipart/form-data">
            Selecciona el archivo a cargar:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="Cargar Archivo" id="submit">
        </form>
        <hr>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">
        <table id="myTable" class="table table-bordered table-striped">
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
    <footer>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script>
            function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
            }
            </script>

    </footer>
</html>