<?php

class AccountingView extends AccountingController
{

    /* --- METHODS --- */

    public function displayAllStudents($Student = 0)
    {
        $SelectedStudent = Validation::testInput($Student);
        $Result = $this->AllStudents();
        $displayAllStudents = "";
        foreach ($Result as $row) {
            $StudentID = Validation::displayInput($row['StudentID']);
            $StudentFullName = Validation::displayInput($row['StudentFullName']);
            ($StudentID === $SelectedStudent) ? $selected = " selected" : $selected = "";
            $displayAllStudents .= '                            <option value="' . $StudentID . '"' . $selected . '>' . $StudentFullName . '</option>' . PHP_EOL;
        }
        $Result = NULL;
        return $displayAllStudents;
    }

    public function displayStudentAccount($StudentID)
    {
        $StudentID = Validation::testInput($StudentID);

        $Result = $this->StudentAccount($StudentID);

        $displayStudentAccount = "";
        $AccountBalance = 0;
        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $StAccountID = Validation::displayInput($row["StAccountID"]);
                $Date = Validation::displayInput($row["Date"]);
                $Description = Validation::displayInput($row["Description"]);
                $Amount = Validation::displayInput($row["Amount"]);
                $AccountBalance += $Amount;

                $displayStudentAccount .=
                    '                        <tr>' . PHP_EOL .
                    '                            <td>' . $Date . '</td>' . PHP_EOL .
                    '                            <td>' . $Description . '</td>' . PHP_EOL .
                    '                            <td class="text-end">' . Formatter::formatCurrency($Amount) . '</td>' . PHP_EOL .
                    '                            <td class="text-nowrap"><div class="d-flex"><form action="accounting_editentry.php" method="post" class="mb-0"><input type="hidden" name="staccountid" value="' . $StAccountID . '"><input type="hidden" name="studentid" value="' . $StudentID . '"><button type="submit" class="btn btn-outline-primary mx-1" title="Edit Entry"><i class="bi bi-pencil-square"></i></button></form><form action="accounting_do_deleteentry.php" method="post" class="mb-0"><input type="hidden" name="staccountid" value="' . $StAccountID . '"><input type="hidden" name="studentid" value="' . $StudentID . '"><button type="submit" class="btn btn-outline-danger mx-1" title="Edit Entry"><i class="bi bi-trash3-fill"></i></button></form></div></td>' . PHP_EOL .
                    '                        </tr>' . PHP_EOL;
            }
            $displayStudentAccount .=
                '                        </tbody>' . PHP_EOL .
                '                        <tfoot>' . PHP_EOL .
                '                            <tr class="table-primary">' . PHP_EOL .
                '                                <th colspan="2">Balance :</th>' . PHP_EOL .
                '                                <th class="text-end">' . Formatter::formatCurrency($AccountBalance) . '</th>' . PHP_EOL .
                '                                <th></th>' . PHP_EOL .
                '                            </tr>' . PHP_EOL .
                '                        </tfoot>' . PHP_EOL;
        }
        $Result = NULL;
        return $displayStudentAccount;
    }
}