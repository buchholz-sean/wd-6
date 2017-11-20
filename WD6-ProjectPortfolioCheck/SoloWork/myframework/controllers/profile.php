<?php

class profile extends AppController
{
    public function __construct()
    {
        if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {
        } else {
            header("Location:/welcome");
        }
    }

    public function index()
    {
        // default method
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"profile"));
        $this->getView('userHome');
        $this->getView('footer');
    }

    public function updatePic()
    {
        if ($_FILES["img"]["name"]!="") {
            $imageFileType = pathinfo("assets/".$_FILES["img"]["name"], PATHINFO_EXTENSION);
            if (file_exists("assets/".$_FILES["img"]["name"])) {
                $msg = "File exists";
                $lblCl = "danger";
                header("Location:/profile?profpicmsg=".$msg."&class=".$lblCl);
            } else {
                if ($imageFileType != "jpg" && $imageFileType != "png") {
                    $msg = "Sorry, please select a .jpg or .png";
                    $lblCl = "info";
                    header("Location:/profile?profpicmsg=".$msg."&class=".$lblCl);
                } else {
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], "assets/".$_FILES["img"]["name"])) {
                        $msg = "File uploaded successfully";
                        $lblCl = "success";
                        header("Location:/profile?profpicmsg=".$msg."&class=".$lblCl);
                    } else {
                        $msg = "Error uploading file.";
                        $lblCl = "danger";
                        header("Location:/profile?profpicmsg=".$msg."&class=".$lblCl);
                    }
                }
            }
        }
    }
}
