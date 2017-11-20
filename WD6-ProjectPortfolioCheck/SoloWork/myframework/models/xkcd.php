<?php
class xkcd
{
    public function __construct($parent)
    {
        $this->db = $parent->db;
    }

    public function getComicData($query)
    {
        $response = file_get_contents('https://www.xkcd.com/'.$query.'/info.0.json');
        $response = json_decode($response, true);
        return $response;
    }
}
