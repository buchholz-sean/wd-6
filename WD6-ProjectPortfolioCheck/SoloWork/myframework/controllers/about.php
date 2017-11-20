<?php

class about extends AppController
{
    public function __construct($parent)
    {
        $this->parent = $parent;
        $this->showList();
    }

    // Views

    public function showList()
    {
        $data = $this->parent->getModel("fruits")->select(
            "select * from fruit_table"
        );
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"about"));
        $this->getView('about', $data);
        $this->getView('footer');
    }

    public function addForm()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"about"));
        $this->getView('addForm');
        $this->getView('footer');
    }

    public function editForm()
    {
        $_SESSION["updateid"] = $_GET["id"];
        $_SESSION["updatename"] = $this->parent->getModel("fruits")->select(
            "select name from fruit_table where id=(:id)",
            array(":id"=>$_SESSION["updateid"])
        );
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"about"));
        $this->getView('editForm', array("fruitname"=>$_SESSION["updatename"][0]["name"]));
        $this->getView('footer');
    }

    // CRUD functions

    public function addItem()
    {
        $this->parent->getModel("fruits")->add(
            "insert into fruit_table (name) values (:name)",
            array(":name"=>$_REQUEST["name"])
        );
        $this->parent->redirect('/about');
    }

    public function editItem()
    {
        $this->parent->getModel("fruits")->update(
            "update fruit_table set name=(:newName) where id=(:id)",
            array(
                ":newName"=>$_REQUEST["newName"],
                ":id"=>$_SESSION["updateid"]
            )
        );
        $this->parent->redirect('/about');
    }

    public function deleteItem()
    {
        $this->parent->getModel("fruits")->delete(
            "delete from fruit_table where id=(:id)",
            array(":id"=>$_GET["id"])
        );
        $this->parent->redirect('/about');
    }
}
