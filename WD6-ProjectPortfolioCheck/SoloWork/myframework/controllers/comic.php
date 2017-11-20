<?php
class comic extends AppController
{
    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    public function index()
    {
        $this->getView("header");
        $this->getView("navigation", array("pagename"=>"comic"));
        $query = $this->random();
        $data = $this->parent->getModel("xkcd")->getComicData($query);
        $this->getView("comic", $data);
        $this->getView("footer");
    }

    public function random()
    {
        $maxNum = $this->getLastComic();
        $random = rand(1, $maxNum);
        return $random;
    }

    public function selectComic()
    {
        $this->getView("header");
        $this->getView("navigation", array("pagename"=>"comic"));
        $query = $_REQUEST["comic"];
        $lastComic = $this->getLastComic();
        if ($query > $lastComic) {
            $query = $lastComic;
        }
        $data = $this->parent->getModel("xkcd")->getComicData($query);
        $this->getView("comic", $data);
        $this->getView("footer");
    }

    public function getLastComic()
    {
        $response = file_get_contents("https://www.xkcd.com/info.0.json");
        $response = json_decode($response, true);
        $lastComic = $response["num"];
        return $lastComic;
    }
}
