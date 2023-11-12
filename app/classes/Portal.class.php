<?php

class Portal
{

    public function clearAlert()
    {
        if (isset($_SESSION['Alert'])) {
            if ($_SESSION['Alert'] == true) {
                unset($_SESSION['Alert']);
                unset($_SESSION['AlertType']);
                unset($_SESSION['AlertIcon']);
                unset($_SESSION['AlertTitle']);
                unset($_SESSION['AlertMessage']);
            }
        }
    }
}