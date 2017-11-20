<?php
class auth extends AppController
{
    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    public function login()
    {
        if (@$_REQUEST["username"] && @$_REQUEST["password"]) {
            $data = $this->parent->getModel("users")->select(
                "select id from users where username = :username and password = :password",
                array(":username"=>$_REQUEST["username"], "password"=>sha1($_REQUEST["password"]))
            );
            if ($data) {
                $_SESSION["loggedin"] = 1;
                $_SESSION["userId"] = $data[0]["id"];
                $_SESSION["username"] = $_REQUEST["username"];
                header("Location:/profile");
            } else {
                header("Location:/welcome?msg=Invalid Login");
            }
        }
    }

    public function logout()
    {
        unset($_SESSION["loggedin"]);
        header("Location:/welcome");
    }
}
