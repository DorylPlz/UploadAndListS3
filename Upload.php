<?php
	require 'C:/Users/daryl/vendor/autoload.php';
	require 'start.php';
	$config = require('config.php');

	$keyName = 'prueba/' . basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.us-east-1.amazonaws.com/' . $config['s3']['bucket'] . '/' . $keyName;

	try {
		$file = $_FILES["fileToUpload"]['name'];

		$s3->putObject(
			array(
				'Bucket'=>$config['s3']['bucket'],
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}

	header('Location: index.php');

?>
