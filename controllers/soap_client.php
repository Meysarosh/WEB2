<?php
$options = [
    'location' => 'http://localhost/project/controllers/soap_server.php',
    'uri' => 'http://localhost/project/controllers/soap_server.php',
];

// Create the SOAP client
$client = new SoapClient(null, $options);

try {
    // Call the getUsers method
    $users = $client->getUsers();
    echo "<h2>Users:</h2>";
    echo "<pre>" . print_r($users, true) . "</pre>";

    // Call the getPlaces method
    $places = $client->getPlaces();
    echo "<h2>Places:</h2>";
    echo "<pre>" . print_r($places, true) . "</pre>";
} catch (Exception $e) {
    echo "SOAP Error: " . $e->getMessage();
}
?>
