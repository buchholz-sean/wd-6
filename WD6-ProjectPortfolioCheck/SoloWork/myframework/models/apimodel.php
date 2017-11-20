<?php
require_once './google-api-php-client-2.2.0/vendor/autoload.php';
class apiModel
{
    public function __construct($parent)
    {
        $this->db = $parent->db;
    }

    public function googleBooks($term='')
    {
        $client = new Google_Client();
        $client -> setApplicationName("serversidelang ");
        $client -> setDeveloperKey("AIzaSyBampySqtYFhqLp3-TMsUNfboBenlpnAjs");

        $service = new Google_Service_Books($client);

        $optParams = array("filter"=>"free-ebooks");
        $result = $service->volumes->listVolumes($term, $optParams);

        return $result;
    }
}
