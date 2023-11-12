<?php

class Website extends Database
{

    /* --- METHODS --- */
    protected function AllFaculty()
    {
        $sql = "SELECT VW_AllFaculty_OB_LastFirst.* FROM VW_AllFaculty_OB_LastFirst";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();
        $Result = $stmt->fetchAll();

        $sql = "";
        $stmt = "";

        return $Result;
    }

    protected function TermFall2023()
    {
        $sql = "SELECT VW_Term_Fall2023.* FROM VW_Term_Fall2023";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();
        $Result = $stmt->fetchAll();

        $sql = "";
        $stmt = "";

        return $Result;
    }

    protected function TermSpring2024()
    {
        $sql = "SELECT VW_Term_Spring2024.* FROM VW_Term_Spring2024";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();
        $Result = $stmt->fetchAll();

        $sql = "";
        $stmt = "";

        return $Result;
    }
}