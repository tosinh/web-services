<?php

class Client
{
    public function __construct()
    {
        $params = array(
            'location' => 'http://localhost/webservices/Lab12/server.php',
            'uri' => 'urn://localhost/webservices/Lab12/server.php',
            'trace' => '1'
        );
        $this->instance = new SoapClient(NULL, $params);
    }

    public function getName($idArray)
    {
        return $this->instance->__soapCall('getStudentName', $idArray);
    }
}

$client = new Client();
