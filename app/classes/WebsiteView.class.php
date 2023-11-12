<?php

class WebsiteView extends Website
{

    /* --- METHODS --- */

    public function displayAllFaculty()
    {
        $resultAllFaculty = $this->AllFaculty();

        $displayAllFaculty = "";

        foreach ($resultAllFaculty as $row) {
            $Instructor = Validation::displayInput($row["Instructor"]);
            $Department = Validation::displayInput($row["Department"]);
            $Email = Validation::displayInput($row["Email"]);

            $displayAllFaculty .= '                  <tr>' . PHP_EOL .
                '                       <td>' . $Instructor . '</td>' . PHP_EOL .
                '                       <td>' . $Department . '</td>' . PHP_EOL .
                '                       <td class="text-nowrap"><a href="mailto:' . strtolower($Email) . '@smallscommunitycollege.org" class="btn btn-primary btn-sm"><i class="bi bi-envelope-fill"></i> Email</a></td>' . PHP_EOL .
                '                  </tr>' . PHP_EOL;
        }

        $resultAllFaculty = "";
        return $displayAllFaculty;
    }

    public function displayTermFall2023()
    {
        $resultTermFall2023 = $this->TermFall2023();

        $displayTermFall2023 = "";

        foreach ($resultTermFall2023 as $row) {
            $Term = Validation::displayInput($row["TermDisplayTitle"]);
            $TermStart = Validation::displayInput($row["TermStart"]);
            $TermEnd = Validation::displayInput($row["TermEnd"]);

            $displayTermFall2023 .= '                  <tr>' . PHP_EOL .
                '                       <td>' . $Term . '</td>' . PHP_EOL .
                '                       <td>' . $TermStart . '</td>' . PHP_EOL .
                '                       <td>' . $TermEnd . '</td>' . PHP_EOL .
                '                  </tr>' . PHP_EOL;
        }
        $resultTermFall2023 = "";
        return $displayTermFall2023;
    }

    public function displayTermSpring2024()
    {
        $resultTermSpring2024 = $this->TermSpring2024();

        $displayTermSpring2024 = "";

        foreach ($resultTermSpring2024 as $row) {
            $Term = Validation::displayInput($row["TermDisplayTitle"]);
            $TermStart = Validation::displayInput($row["TermStart"]);
            $TermEnd = Validation::displayInput($row["TermEnd"]);

            $displayTermSpring2024 .= '                  <tr>' . PHP_EOL .
                '                       <td>' . $Term . '</td>' . PHP_EOL .
                '                       <td>' . $TermStart . '</td>' . PHP_EOL .
                '                       <td>' . $TermEnd . '</td>' . PHP_EOL .
                '                  </tr>' . PHP_EOL;
        }
        $resultTermSpring2024 = "";
        return $displayTermSpring2024;
    }
}