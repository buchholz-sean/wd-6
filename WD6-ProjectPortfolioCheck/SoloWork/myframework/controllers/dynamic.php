<?php

class dynamic extends AppController
{
    public function __construct()
    {
    }

    public function login()
    {
        if (@$_REQUEST["username"] && @$_REQUEST["password"]) {
            if (@$_REQUEST["username"]=="sean" && @$_REQUEST["password"]=="root") {
                $_SESSION["loggedin"] = 1;
                header("Location:/profile");
            } else {
                header("Location:/welcome?msg=Invalid Login");
            }
        } else {
            header("Location:/welcome?msg=Invalid Login");
        }
    }

    public function index()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"dynamic"));
        $this->getView('dynamic');
        $this->getView('footer');
    }

    public function formlogin()
    {
        // Valid users and passwords
        $users = array(
            "mike@aol.com" => "password",
             "joe@aol.com" => "password"
         );
        // Check file name is not blank
        if ($_FILES["creds"]["name"] != "") {
            // Check file extention is .txt
            $credsFileType = pathinfo("assets/".$_FILES["creds"]["name"], PATHINFO_EXTENSION);
            if ($credsFileType != "txt") {
                // If not .txt, alert user
                $credmsg = "Please upload a .txt file.";
                header("Location:/auth/dynamic?credmsg=".$credmsg);
            } else {
                // If .txt, move file to /assets
                if (move_uploaded_file($_FILES["creds"]["tmp_name"], "assets/".$_FILES["creds"]["name"])) {
                    $fileToCheck = "assets/".$_FILES["creds"]["name"];
                    $fileContents = file_get_contents($fileToCheck);
                    $stringsToCheck = explode("|", $fileContents);
                    if (array_key_exists($stringsToCheck[0], $users)) {
                        if ($stringsToCheck[1] == $users[$stringsToCheck[0]]) {
                            $_SESSION["loggedin"] = 1;
                            $_SESSION["bio"] = $stringsToCheck[2];
                            header("Location:/profile");
                        } else {
                            $credmsg = "Bad username/password";
                            header("Location:/auth/dynamic?credmsg=".$credmsg);
                        }
                    } else {
                        $credmsg = "No such user";
                        header("Location:/auth/dynamic?credmsg=".$credmsg);
                    }
                }
                unlink($fileToCheck);
            }
        } else {
            $credmsg = "Please select a file to upload";
            header("Location:/auth/dynamic?credmsg=".$credmsg);
        }
    }

    public function logout()
    {
        unset($_SESSION["loggedin"]);
        header("Location:/welcome");
    }
}
