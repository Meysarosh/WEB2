<?php
phpinfo();

$client = new SoapClient(null, [
    'location' => 'http://localhost/project/controllers/soap.php',
    'uri' => 'http://localhost/project/',
    ]);
    
    // Example: Get all users
    $users = $client->getAll();
    print_r($users);
?>