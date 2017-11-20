<?php

class account extends AppController
{
    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    // Views

    public function register()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"register"));
        $this->getView('register');
        $this->getView('footer');
    }

    public function newPass()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"profile"));
        $this->getView('newpass');
        $this->getView('footer');
    }

    public function confirmDelete()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"profile"));
        $this->getView('confirmDelete');
        $this->getView('footer');
    }

    // CRUD functions

    public function addUser()
    {
        $recordExists = $this->parent->getModel("users")->select(
            "select id from users where username = (:username)",
            array(":username"=>$_REQUEST["username"])
        );
        if ($recordExists) {
            $regmsg = "Sorry, that username already exists.";
            $this->parent->redirect("/account/register?regmsg=".$regmsg);
        } else {
            if ($_REQUEST["password"] == $_REQUEST["passwordverify"]) {
                $this->parent->getModel("users")->add(
                "insert into users (username, password) values (:username, sha1(:password))",
                array(
                    ":username"=>$_REQUEST["username"],
                    ":password"=>$_REQUEST["password"]
                )
            );
                $this->parent->redirect("/welcome/thanks");
            } else {
                $regmsg = "Password mismatch";
                $this->parent->redirect("/account/register?regmsg=".$regmsg);
            }
        }
    }

    public function updateUser()
    {
        $data = $this->parent->getModel("users")->select(
            "select password from users where id=(:id)",
            array(":id"=>$_SESSION["userId"])
            );

        if ($data[0]["password"] != sha1($_REQUEST["oldpass"])) {
            $passmsg = "Incorrect password";
            $this->parent->redirect("/account/newPass?passmsg=".$passmsg);
        } else {
            if ($_REQUEST["password"] == $_REQUEST["passwordverify"]) {
                $this->parent->getModel("users")->update(
                "update users set password=sha1(:password) where id=(:id)",
                array(
                    ":password"=>$_REQUEST["password"],
                    ":id"=>$_SESSION["userId"]
                )
                );
                $success = "Password changed successfully";
                $this->parent->redirect("/profile?msg=".$success);
            } else {
                $passmsg = "Password mismatch!";
                $this->parent->redirect("/account/newPass?passmsg=".$passmsg);
            }
        }
    }

    public function deleteUser()
    {
        $this->parent->getModel("users")->delete(
            "delete from users where id=(:id)",
            array(":id"=>$_SESSION["userId"])
        );
        unset($_SESSION["loggedin"]);
        $this->parent->redirect("/welcome");
    }
}
