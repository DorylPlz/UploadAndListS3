<?php

use Aws\S3\S3Client;
require 'C:/Users/daryl/vendor/autoload.php';

$config = require('config.php');

$s3 = S3Client::factory(
    array(
        'credentials' => array(
            'key' => $config['s3']['key'],
            'secret' => $config['s3']['secret']
        ),
        'version' => 'latest',
        'region'  => $config['s3']['region']
    )
);
?>
