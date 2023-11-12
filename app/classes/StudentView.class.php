<?php

class StudentView extends StudentController
{

    /* --- PROPERTIES --- */
    protected $StudentID;
    protected $StudentFirstName;
    protected $StudentMiddleName;
    protected $StudentLastName;
    protected $StudentFullName;
    protected $StudentFullName_MI;
    protected $StudentDOB;
    protected $StudentAddressLine1;
    protected $StudentAddressLine2;
    protected $StudentCity;
    protected $StudentState;
    protected $StudentPostalCode;
    protected $StudentPhoneNumber;
    protected $StudentEmail;
    protected $StudentProgramTitle;
    protected $StudentProgramType;
    protected $StudentAdvisor;
    protected $StudentCurrentSemesterTitle;
    protected $StudentCurrentSemesterTerms;

    /* --- METHODS --- */

    public function __construct()
    {
        $StudentID = $_SESSION["LinkedID"];

        $Result = $this->StudentInfo($StudentID);

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $this->StudentID = Validation::displayInput($row["StudentID"]);
                $this->StudentFirstName = Validation::displayInput($row["FirstName"]);
                $this->StudentMiddleName = Validation::displayInput($row["MiddleName"]);
                $this->StudentLastName = Validation::displayInput($row["LastName"]);
                $this->StudentFullName = Validation::displayInput($row["FullName"]);
                $this->StudentFullName_MI = Validation::displayInput($row["FullName_MI"]);
                $this->StudentDOB = Validation::displayInput($row["DOB"]);
                $this->StudentAddressLine1 = Validation::displayInput($row["AddressLine1"]);
                $this->StudentAddressLine2 = Validation::displayInput($row["AddressLine2"]);
                $this->StudentCity = Validation::displayInput($row["City"]);
                $this->StudentState = Validation::displayInput($row["State"]);
                $this->StudentPostalCode = Validation::displayInput($row["PostalCode"]);
                $this->StudentPhoneNumber = Validation::displayInput($row["PhoneNumber"]);
                $this->StudentEmail = Validation::displayInput($row["Email"]);
                $this->StudentProgramTitle = Validation::displayInput($row["ProgTitle"]);
                $this->StudentProgramType = Validation::displayInput($row["ProgType"]);
                $this->StudentAdvisor = Validation::displayInput($row["Advisor"]);
                $this->StudentCurrentSemesterTitle = Validation::displayInput($row["CurrentSemesterTitle"]);
                $this->StudentCurrentSemesterTerms = Validation::displayInput($row["CurrentSemesterTerms"]);
            }
        }
        $Result = "";
    }

    public function displayStudentID()
    {
        return $this->StudentID;
    }

    public function displayStudentFullName_MI()
    {
        return $this->StudentFullName_MI;
    }
    public function displayStudentDOB()
    {
        return $this->StudentDOB;
    }

    public function displayStudentAddressLine1()
    {
        return $this->StudentAddressLine1;
    }

    public function displayStudentAddressLine2()
    {
        return $this->StudentAddressLine2;
    }

    public function displayStudentCity()
    {
        return $this->StudentCity;
    }

    public function displayStudentState()
    {
        return $this->StudentState;
    }

    public function displayStudentPostalCode()
    {
        return $this->StudentPostalCode;
    }

    public function displayStudentPhoneNumber()
    {
        return $this->StudentPhoneNumber;
    }

    public function displayStudentEmail()
    {
        return $this->StudentEmail;
    }

    public function displayStudentProgramTitle()
    {
        return $this->StudentProgramTitle;
    }

    public function displayStudentProgramType()
    {
        return $this->StudentProgramType;
    }

    public function displayStudentAdvisor()
    {
        return $this->StudentAdvisor;
    }

    public function displayStudentCurrentSemesterTitle()
    {
        return $this->StudentCurrentSemesterTitle;
    }

    public function displayStudentCurrentSemesterTerms()
    {
        return $this->StudentCurrentSemesterTerms;
    }

    public function displayStudentAccount($StudentID)
    {
        $Result = $this->StudentAccount($StudentID);

        $displayStudentAccount = "";
        $StudentAccountBalance = 0;

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $StudentAccountID = Validation::displayInput($row["StAccountID"]);
                $StudentAccountDate = Validation::displayInput($row["Date"]);
                $StudentAccountDescription = Validation::displayInput($row["Description"]);
                $StudentAccountAmount = Validation::displayInput($row["Amount"]);
                $StudentAccountBalance += $row["Amount"];

                $displayStudentAccount .=
                    '              <tr>' . PHP_EOL .
                    '                   <td>' . $StudentAccountDate . '</td>' . PHP_EOL .
                    '                   <td>' . $StudentAccountDescription . '</td>' . PHP_EOL .
                    '                   <td class="text-end">' . Formatter::formatCurrency($StudentAccountAmount) . '</td>' . PHP_EOL .
                    '               </tr>' . PHP_EOL;
            }
            $displayStudentAccount .=
                '         </tbody>' . PHP_EOL .
                '           <tfoot>' . PHP_EOL .
                '               <tr class="table-primary">' . PHP_EOL .
                '                   <th colspan="2">Balance :</th>' . PHP_EOL .
                '                   <th class="text-end">' . Formatter::formatCurrency($StudentAccountBalance) . '</th>' . PHP_EOL .
                '               </tr>' . PHP_EOL .
                '           </tfoot>' . PHP_EOL;
        }
        $Result = "";
        return $displayStudentAccount;
    }

    public function displayStudentSchedule($Semester)
    {
        $Result = $this->StudentSchedule($this->StudentID, $Semester);

        $displayStudentSchedule = "";
        $ClassCount = 0;

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $ClassTerm = Validation::displayInput($row["ClassTerm"]);
                $ClassCode = Validation::displayInput($row["ClassCode"]);
                $ClassTitle = Validation::displayInput($row["ClassTitle"]);
                $ClassInstructor = Validation::displayInput($row["ClassInstructor"]);
                $ClassLocation = Validation::displayInput($row["ClassLocation"]);
                $ClassStart = Validation::displayInput($row["ClassStart"]);
                $ClassEnd = Validation::displayInput($row["ClassEnd"]);
                $ClassCount += 1;

                $displayStudentSchedule .= '             <tr>' . PHP_EOL .
                    '                   <td>' . $ClassCode . '</td>' . PHP_EOL .
                    '                   <td>' . $ClassTitle . '</td>' . PHP_EOL .
                    '                   <td>' . $ClassInstructor . '</td>' . PHP_EOL .
                    '                   <td>' . $ClassLocation . '</td>' . PHP_EOL .
                    '                   <td>' . $ClassStart . '</td>' . PHP_EOL .
                    '                   <td>' . $ClassEnd . '</td>' . PHP_EOL .
                    '               </tr>' . PHP_EOL;
            }
            $displayStudentSchedule .= '         </tbody>' . PHP_EOL .
                '           <tfoot>' . PHP_EOL .
                '               <tr class="table-primary">' . PHP_EOL .
                '                   <th colspan="6">Class Count : ' . $ClassCount . '</th>' . PHP_EOL .
                '               </tr>' . PHP_EOL .
                '           </tfoot>' . PHP_EOL;
        } else {
            $displayStudentSchedule .= '             <tr>' . PHP_EOL .
                '                   <td colspan="6">No classes found.</td>' . PHP_EOL .
                '               </tr>' . PHP_EOL;
        }
        $Result = "";
        return $displayStudentSchedule;
    }

    public function getStudentAccountBalance($StudentID)
    {
        $Result = $this->StudentAccountBalance($StudentID);
        if (count($Result) === 1) {
                $StudentAccountBalance = $Result["AccountBalance"];

                return $StudentAccountBalance;
        }
    }

    public function displayStudentAccountBalance($displayFormat = true)
    {
        if ($displayFormat === true) {
            return Formatter::formatCurrency($this->getStudentAccountBalance($this->StudentID));
        } else {
            return $this->getStudentAccountBalance($this->StudentID);
        }
    }

    public function displayStudentBorrowCount()
    {
        $Result = $this->StudentBorrowCount($this->StudentID);

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $BorrowCount = $row["BorrowCount"];

                return $BorrowCount;
            }
        } else {
            return "Currently unavailable";
        }
    }

    public function displayStudentParkingDecals()
    {
        $Result = $this->StudentParkingDecals($this->StudentID);

        $displayStudentParkingDecals = "";

        if (count($Result) >= 1) {
            $displayStudentParkingDecals .= '<table class="table table-striped table-hover my-0">' . PHP_EOL .
                '                           <thead>' . PHP_EOL .
                '                               <tr>' . PHP_EOL .
                '                                   <th>Decal ID</th>' . PHP_EOL .
                '                                   <th>Lic. Plate</th>' . PHP_EOL .
                '                                   <th>Issued</th>' . PHP_EOL .
                '                                   <th>Expiry</th>' . PHP_EOL .
                '                               <tr>' . PHP_EOL .
                '                           </thead>' . PHP_EOL .
                '                           <tbody>' . PHP_EOL;
            foreach ($Result as $row) {
                $StudentParkingDecalID = Validation::displayInput($row["DecalID"]);
                $StudentParkingLicensePlate = Validation::displayInput($row["LicensePlate"]);
                $StudentParkingIssued = Validation::displayInput($row["Issued"]);
                $StudentParkingExpiry = Validation::displayInput($row["Expiry"]);

                $displayStudentParkingDecals .=
                    '                           <tr>' . PHP_EOL .
                    '                               <td class="text-nowrap">' . $StudentParkingDecalID . '</td>' . PHP_EOL .
                    '                               <td class="text-nowrap">' . $StudentParkingLicensePlate . '</td>' . PHP_EOL .
                    '                               <td>' . $StudentParkingIssued . '</td>' . PHP_EOL .
                    '                               <td>' . $StudentParkingExpiry . '</td>' . PHP_EOL .
                    '                           </tr>' . PHP_EOL;
            }
            $displayStudentParkingDecals .= '                           </tbody>' . PHP_EOL .
                '                       </table>' . PHP_EOL;

            $Result = "";
            return $displayStudentParkingDecals;
        } else {
            return "No current parking decals";
        }
    }

    public function displayStudentBooks()
    {
        $Result = $this->StudentBooks($this->StudentID);

        $displayStudentBooks = '';
        $BookCount = 0;

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $BookISBN10 = Validation::displayInput($row["ISBN10"]);
                $BookISBN13 = Validation::displayInput($row["ISBN13"]);
                ($BookISBN13 === "" || $BookISBN13 === NULL) ? $BookISBN = $BookISBN10 : $BookISBN = $BookISBN13;
                $BookTitle = Validation::displayInput($row["BookTitle"]);
                $BookAuthor = Validation::displayInput($row["BookAuthor"]);
                $BorrowStart = Validation::displayInput($row["Start"]);
                $BorrowEnd = Validation::displayInput($row["End"]);
                $BookCount += 1;

                $displayStudentBooks .= '<tr>' . PHP_EOL .
                    '               <td>' . $BookTitle . '<br><span class="text-secondary">ISBN : ' . $BookISBN . '</span></td>' . PHP_EOL .
                    '               <td>' . $BookAuthor . '</td>' . PHP_EOL .
                    '               <td>' . $BorrowStart . '</td>' . PHP_EOL .
                    '               <td class="' . $this->getBorrowEndTextColor($BorrowEnd) . '">' . $BorrowEnd . '</td>' . PHP_EOL .
                    '           </tr>' . PHP_EOL;
            }
            $displayStudentBooks .= '         </tbody>' . PHP_EOL .
                '           <tfoot>' . PHP_EOL .
                '               <tr>' . PHP_EOL .
                '                   <th colspan="7">Book Count : ' . $BookCount . '</th>' . PHP_EOL .
                '               </tr>' . PHP_EOL .
                '           </tfoot>' . PHP_EOL;
        } else {
            $displayStudentBooks .= '<tr>' . PHP_EOL .
                '               <td colspan="4">No books found.</td>' . PHP_EOL .
                '           </tr>' . PHP_EOL;
        }
        $Result = "";
        return $displayStudentBooks;
    }

    public function getBorrowEndTextColor($BorrowEnd)
    {
        ($BorrowEnd >= date("m/d/Y")) ? $TextColor = 'text-success' : $TextColor = 'text-danger';

        return $TextColor;
    }

    public function displayStudentAcademicRecord()
    {
        $Result = $this->StudentAcademicRecord($this->StudentID);

        $displayStudentAcademicRecord = "";

        $RecordCount = count($Result);
        $OverallEarnedUnits = 0;
        $OverallEarnedGradePoints = 0;
        $OvercallClassCount = 0;

        if ($RecordCount > 0) {
            for ($i = 0; $i < $RecordCount; $i++) {
                $TermTitle = $Result[$i]["TermTitle"];
                $ClassCount = 0;
                $SemesterGradePoints = 0;
                $SemesterAttemptedUnits = 0;
                $SemesterEarnedUnits = 0;
                $SemesterEarnedGradePoints = 0;
                $displayStudentAcademicRecord .=
                    '           <h4 class="text-primary mt-5">' . $TermTitle . '</h4>' . PHP_EOL .
                    '           <table class="table table-striped table-hover">' . PHP_EOL .
                    '               <thead>' . PHP_EOL .
                    '                   <tr>' . PHP_EOL .
                    '                       <th scope="col">Course</th>' . PHP_EOL .
                    '                       <th scope="col">Instructor</th>' . PHP_EOL .
                    '                       <th scope="col" class="text-center">Grade</th>' . PHP_EOL .
                    '                       <th scope="col" class="text-end">Grade Points</th>' . PHP_EOL .
                    '                       <th scope="col" class="text-end">Units</th>' . PHP_EOL .
                    '                       <th scope="col" class="text-end">Earned Grade Points</th>' . PHP_EOL .
                    '                   </tr>' . PHP_EOL .
                    '               </thead>' . PHP_EOL .
                    '               <tbody>' . PHP_EOL;
                foreach ($Result as $row) {
                    if ($TermTitle === $row["TermTitle"]) {
                        $TermTitle = Validation::displayInput($row["TermTitle"]);
                        $ClassCode = Validation::displayInput($row["ClassCode"]);
                        $CourseTitle = Validation::displayInput($row["CourseTitle"]);
                        $ClassInstructor = Validation::displayInput($row["Instructor"]);
                        $Grade = Validation::displayInput($row["Grade"]);
                        $GradePoints = Validation::displayInput($row["GradePoints"]);
                        $SemesterGradePoints += $GradePoints;
                        $Units = Validation::displayInput($row["Units"]);
                        $SemesterAttemptedUnits += $Units;
                        if ($Grade !== 'W') {
                            $SemesterEarnedUnits += $Units;
                            $OverallEarnedUnits += $Units;
                        }
                        $EarnedGradePoints = Validation::displayInput($row["EarnedGradePoints"]);
                        $SemesterEarnedGradePoints += $EarnedGradePoints;
                        $OverallEarnedGradePoints += $EarnedGradePoints;
                        $ClassCount++;
                        $OvercallClassCount++;

                        $displayStudentAcademicRecord .=
                            '                   <tr scope="row">' . PHP_EOL .
                            '                       <td>' . $ClassCode . ' - ' . $CourseTitle . '</td>' . PHP_EOL .
                            '                       <td>' . $ClassInstructor . '</td>' . PHP_EOL .
                            '                       <td class="text-center">' . $Grade . '</td>' . PHP_EOL .
                            '                       <td class="text-end">' . $GradePoints . '</td>' . PHP_EOL .
                            '                       <td class="text-end">' . $Units . '</td>' . PHP_EOL .
                            '                       <td class="text-end">' . $EarnedGradePoints . '</td>' . PHP_EOL .
                            '                   </tr>' . PHP_EOL;
                    }
                }
                if ($SemesterEarnedUnits !== 0) {
                    $SemesterGPA = $SemesterEarnedGradePoints / $SemesterEarnedUnits;
                } else {
                    $SemesterGPA = 0;
                }
                $displayStudentAcademicRecord .=
                    '               </tbody>' . PHP_EOL .
                    '               <tfoot>' . PHP_EOL .
                    '                   <tr class="table-primary">' . PHP_EOL .
                    '                       <th colspan="6">Class Count : ' . $ClassCount . '</th>' . PHP_EOL .
                    '           </table>' . PHP_EOL .
                    '               <div class="col-md-6 col-xl-4 card border-primary">' . PHP_EOL .
                    '                   <div class="card-body">' . PHP_EOL .
                    '                       Attempted Units: ' . $SemesterAttemptedUnits . '<br>' . PHP_EOL .
                    '                       Earned Units: ' . $SemesterEarnedUnits . '<br>' . PHP_EOL .
                    '                       Academic Period GPA: ' . Formatter::formatNumber($SemesterGPA, 2) . '<br>' . PHP_EOL .
                    '                   </div>' . PHP_EOL .
                    '               </div>' . PHP_EOL;
            }
            $displayStudentAcademicRecord .=
                '<h4 class="mt-5 text-bg-primary rounded p-2">Cumulative GPA: ' . number_format($OverallEarnedGradePoints / $OverallEarnedUnits, 2) . '</h4>' . PHP_EOL;
            $Result = NULL;
            return $displayStudentAcademicRecord;
        }
        return "No academic record found.";
    }

    public function displayStudentCumulativeGPA()
    {
        return $this->StudentCumulativeGPA($this->StudentID);
    }
}
