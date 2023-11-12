<?php

class RegistrantView extends RegistrantController
{

    /* --- PROPERTIES --- */
    protected $Departments;
    protected $Instructors;
    protected $Terms;
    protected $Building;
    protected $DeptID;
    protected $DeptName;
    protected $SelectedDept;
    protected $InstructorID;
    protected $Instructor;
    protected $ClassID;
    protected $ClassCode;
    protected $CourseTitle;
    protected $Term;
    protected $TermDates;
    protected $TermIDs;
    protected $TermTitle;
    protected $VenueIDs;
    protected $CourseID;
    protected $CourseCode;
    protected $Course;
    protected $TermID;
    protected $VenueID;
    protected $Venue;
    protected $Room;
    protected $VenueActive;
    protected $TermSection;
    protected $TermStart;
    protected $TermEnd;
    protected $TermActive;
    protected $ProgramID;
    protected $ProgramTitle;
    protected $ProgramType;
    protected $ProgramActive;
    protected $CourseCredit;
    protected $CourseDepartment;
    protected $CourseFee;
    protected $CourseActive;
    protected $Department;
    protected $ClassActive;


    /* --- METHODS --- */

    public function displayRegistrantClasses($Departments = NULL, $Instructors = NULL, $Terms = NULL, $Building = NULL)
    {
        $this->Departments = $Departments;
        $this->Instructors = $Instructors;
        $this->Departments = $Departments;
        $this->Terms = $Terms;
        $this->Building = $Building;
        $Result = $this->RegistrantClasses($this->Departments, $this->Instructors, $this->Terms, $this->Building);

        $displayRegistrantClasses = '';

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->ClassID = Validation::displayInput($row['ClassID']);
                $this->ClassCode = Validation::displayInput($row['ClassCode']);
                $this->CourseTitle = Validation::displayInput($row['CourseTitle']);
                $this->Instructor = Validation::displayInput($row['Instructor']);
                $this->DeptName = Validation::displayInput($row['DeptName']);
                $this->Term = Validation::displayInput($row['Term']);
                $this->TermDates = Validation::displayInput($row['TermDates']);
                $this->Venue = Validation::displayInput($row['Venue']);
                $this->ClassActive = Validation::displayInput($row['ClassActive']);
                ($this->ClassActive === '1') ? $this->ClassActive = 'Yes' : $this->ClassActive = 'No';

                $displayRegistrantClasses .=
                    '                           <tr>' . PHP_EOL .
                    '                               <td class="text-nowrap">' . $this->ClassCode . '</td>' . PHP_EOL .
                    '                               <td>' . $this->CourseTitle . '</td>' . PHP_EOL .
                    '                               <td>' . $this->Instructor . '</td>' . PHP_EOL .
                    '                               <td>' . $this->DeptName . '</td>' . PHP_EOL .
                    '                               <td>' . $this->Term . '<br>' . $this->TermDates . '</td>' . PHP_EOL .
                    '                               <td>' . $this->Venue . '</td>' . PHP_EOL .
                    '                               <td>' . $this->ClassActive . '</td>' . PHP_EOL .
                    '                               <td><div class="d-flex"><form action="registrant_editclass.php" method="post" class="mb-0"><input type="hidden" name="classid" value="' . $this->ClassID . '"><button class="btn btn-outline-primary mx-1"><i class="bi bi-pencil-square"></i></button></form><form action="registrant_do_deleteclass.php" method="post" class="mb-0"><input type="hidden" name="classid" value="' . $this->ClassID . '"><button class="btn btn-outline-danger mx-1"><i class="bi bi-trash3-fill"></i></button></form></div></td>' . PHP_EOL .
                    '                           </tr>' . PHP_EOL;
            }
        } else {
            $displayRegistrantClasses .=
                '                           <tr>' . PHP_EOL .
                '                               <td colspan="8">No classes found.</td>' . PHP_EOL .
                '                           </tr>' . PHP_EOL;
        }
        $Result = NULL;
        return $displayRegistrantClasses;
    }

    public function displayRegistrantCourses($CourseCode = NULL, $CourseTitle = NULL, $Department = NULL)
    {
        $this->CourseCode = $CourseCode;
        $this->CourseTitle = $CourseTitle;
        $this->Department = $Department;
        $Result = $this->RegistrantCourses($this->CourseCode, $this->CourseTitle, $this->Department);

        $displayRegistrantCourses = '';

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->CourseID = Validation::displayInput($row['CourseID']);
                $this->CourseCode = Validation::displayInput($row['CourseCode']);
                $this->CourseTitle = Validation::displayInput($row['CourseTitle']);
                $this->CourseCredit = Validation::displayInput($row['CourseCredit']);
                $this->CourseFee = Validation::displayInput($row['CourseFee']);
                $this->CourseDepartment = Validation::displayInput($row['DeptName']);
                $this->CourseActive = Validation::displayInput($row['CourseActive']);
                ($this->CourseActive === '1') ? $this->CourseActive = 'Yes' : $this->CourseActive = 'No';

                $displayRegistrantCourses .=
                    '                           <tr>' . PHP_EOL .
                    '                               <td>' . $this->CourseID . '</td>' . PHP_EOL .
                    '                               <td>' . $this->CourseCode . '</td>' . PHP_EOL .
                    '                               <td>' . $this->CourseTitle . '</td>' . PHP_EOL .
                    '                               <td>' . $this->CourseCredit . '</td>' . PHP_EOL .
                    '                               <td>' . Formatter::formatCurrency($this->CourseFee) . '</td>' . PHP_EOL .
                    '                               <td>' . $this->CourseDepartment . '</td>' . PHP_EOL .
                    '                               <td>' . $this->CourseActive . '</td>' . PHP_EOL .
                    '                               <td><div class="d-flex"><form action="registrant_editcourse.php" method="post" class="mb-0"><input type="hidden" name="courseid" value="' . $this->CourseID . '"><button class="btn btn-outline-primary mx-1"><i class="bi bi-pencil-square"></i></button></form><form action="registrant_do_deletecourse.php" method="post" class="mb-0"><input type="hidden" name="courseid" value="' . $this->CourseID . '"><button class="btn btn-outline-danger mx-1"><i class="bi bi-trash3-fill"></i></button></form></div></td>' . PHP_EOL .
                    '                           </tr>' . PHP_EOL;
            }
        } else {
            $displayRegistrantCourses .=
                '                           <tr>' . PHP_EOL .
                '                               <td colspan="8">No courses found.</td>' . PHP_EOL .
                '                           </tr>' . PHP_EOL;
        }
        $Result = NULL;
        return $displayRegistrantCourses;
    }

    public function displayDeptFilter($selectedDept = NULL)
    {
        $Result = $this->DeptFilter();
        $SelectedDept = Validation::displayInput($selectedDept);

        $displayDeptFilter = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->DeptID = Validation::displayInput($row["DeptID"]);
                ($this->DeptID === $SelectedDept) ? $selected = " selected" : $selected = "";
                $this->DeptName = Validation::displayInput($row["DeptName"]);

                $displayDeptFilter .= '                            <option value="' . $this->DeptID . '"' . $selected .
                    '>' . $this->DeptName . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayDeptFilter;
        }
    }

    public function displayInstrFilter($selectedInstr = NULL)
    {
        $Result = $this->InstrFilter();
        $SelectedInstr = Validation::displayInput($selectedInstr);

        $displayInstrFilter = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->InstructorID = Validation::displayInput($row["InstructorID"]);
                ($this->InstructorID === $SelectedInstr) ? $selected = " selected" : $selected = "";
                $this->Instructor = Validation::displayInput($row["Instructor"]);

                $displayInstrFilter .= '                            <option value="' . $this->InstructorID . '"' . $selected .
                    '>' . $this->Instructor . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayInstrFilter;
        }
    }

    public function displayTermFilter($selectedTerm = NULL)
    {
        $Result = $this->TermFilter();
        $SelectedTerm = Validation::displayInput($selectedTerm);

        $displayTermFilter = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->TermIDs = Validation::displayInput($row["TermIDs"]);
                ($this->TermIDs === $SelectedTerm) ? $selected = " selected" : $selected = "";
                $this->TermTitle = Validation::displayInput($row["TermTitle"]);

                $displayTermFilter .= '                            <option value="' . $this->TermIDs . '"' . $selected .
                    '>' . $this->TermTitle . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayTermFilter;
        }
    }

    public function displayVenueFilter($selectedVenue = NULL)
    {
        $Result = $this->VenueFilter();
        $SelectedVenue = Validation::displayInput($selectedVenue);

        $displayVenueFilter = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->VenueIDs = Validation::displayInput($row["VenueIDs"]);
                ($this->VenueIDs === $SelectedVenue) ? $selected = " selected" : $selected = "";
                $this->Building = Validation::displayInput($row["Building"]);

                $displayVenueFilter .= '                            <option value="' . $this->VenueIDs . '"' . $selected .
                    '>' . $this->Building . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayVenueFilter;
        }
    }

    public function displayClassCourses($Course = NULL)
    {
        $Result = $this->ClassCourses();
        $Course = Validation::displayInput($Course);

        $displayClassCourses = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->CourseID = Validation::displayInput($row["CourseID"]);
                ($this->CourseID === $Course) ? $selected = " selected" : $selected = "";
                $this->CourseCode = Validation::displayInput($row["CourseCode"]);
                $this->CourseTitle = Validation::displayInput($row["CourseTitle"]);
                $this->Course = Validation::displayInput($row["Course"]);

                $displayClassCourses .= '                            <option value="' . $this->CourseID . '"' . $selected .
                    '>' . $this->Course . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayClassCourses;
        }
    }

    public function displayClassInstructors($Instructor = NULL)
    {
        $Result = $this->ClassInstructors();
        $Instructor = Validation::displayInput($Instructor);

        $displayClassInstructors = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->InstructorID = Validation::displayInput($row["InstructorID"]);
                ($this->InstructorID === $Instructor) ? $selected = " selected" : $selected = "";
                $this->Instructor = Validation::displayInput($row["Instructor"]);

                $displayClassInstructors .= '                            <option value="' . $this->InstructorID . '"' . $selected .
                    '>' . $this->Instructor . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayClassInstructors;
        }
    }

    public function displayClassTerms($Term = NULL)
    {
        $Result = $this->ClassTerms();
        $Term = Validation::displayInput($Term);

        $displayClassTerms = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->TermID = Validation::displayInput($row["TermID"]);
                ($this->TermID === $Term) ? $selected = " selected" : $selected = "";
                $this->Term = Validation::displayInput($row["Term"]);

                $displayClassTerms .= '                            <option value="' . $this->TermID . '"' . $selected .
                    '>' . $this->Term . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayClassTerms;
        }
    }

    public function displayClassVenues($Venue = NULL)
    {
        $Result = $this->ClassVenues();
        $Venue = Validation::displayInput($Venue);

        $displayClassVenues = "";

        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->VenueID = Validation::displayInput($row["VenueID"]);
                ($this->VenueID === $Venue) ? $selected = " selected" : $selected = "";
                $this->Venue = Validation::displayInput($row["Venue"]);

                $displayClassVenues .= '                            <option value="' . $this->VenueID . '"' . $selected .
                    '>' . $this->Venue . '</option>' . PHP_EOL;
            }
            $Result = "";
            return $displayClassVenues;
        }
    }

    public function displayVenues()
    {
        $Result = $this->Venues();

        $displayVenues = '';
        
        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $VenueID = Validation::displayInput($row['VenueID']);
                $Building = Validation::displayInput($row['Building']);
                $Room = Validation::displayInput($row['Room']);
                $VenueActive = Validation::displayInput($row['VenueActive']);
                ($VenueActive === '1') ? $VenueActive = 'Yes' : $VenueActive = 'No';

                $displayVenues .=
                    '               <tr>' . PHP_EOL .
                    '                   <td>' . $VenueID . '</td>' . PHP_EOL .
                    '                   <td>' . $Building . '</td>' . PHP_EOL .
                    '                   <td>' . $Room . '</td>' . PHP_EOL .
                    '                   <td>' . $VenueActive . '</td>' . PHP_EOL .
                    '                   <td><div class="d-flex"><form action="registrant_editvenue.php" method="post" class="mb-0"><input type="hidden" name="venueid" value="' . $VenueID . '"><button class="btn btn-outline-primary mx-1"><i class="bi bi-pencil-square"></i></button></form><form action="registrant_do_deletevenue.php" method="post" class="mb-0"><input type="hidden" name="venueid" value="' . $VenueID . '"><button class="btn btn-outline-danger mx-1"><i class="bi bi-trash3-fill"></i></button></form></div></td>' . PHP_EOL .
                    '               </tr>' . PHP_EOL;
            }

        } else {
            $displayVenues = '<tr><td colspan="5">No venues found.</td></tr>';
        }
        $Result = "";
        return $displayVenues;
    }

    public function displayTerms()
    {
        $Result = $this->Terms();

        $displayTerms = '';
        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->TermID = Validation::displayInput($row['TermID']);
                $this->TermTitle = Validation::displayInput($row['TermTitle']);
                $this->TermSection = Validation::displayInput($row['TermSection']);
                $this->TermStart = Validation::displayInput($row['TermStart']);
                $this->TermEnd = Validation::displayInput($row['TermEnd']);
                $this->TermActive = Validation::displayInput($row['TermActive']);
                ($this->TermActive === '1') ? $this->TermActive = 'Yes' : $this->TermActive = 'No';

                $displayTerms .=
                    '               <tr>' . PHP_EOL .
                    '                   <td>' . $this->TermID . '</td>' . PHP_EOL .
                    '                   <td>' . $this->TermTitle . '</td>' . PHP_EOL .
                    '                   <td>' . $this->TermSection . '</td>' . PHP_EOL .
                    '                   <td>' . $this->TermStart . '</td>' . PHP_EOL .
                    '                   <td>' . $this->TermEnd . '</td>' . PHP_EOL .
                    '                   <td>' . $this->TermActive . '</td>' . PHP_EOL .
                    '                   <td><div class="d-flex"><form action="registrant_editterm.php" method="post" class="mb-0"><input type="hidden" name="termid" value="' . $this->TermID . '"><button class="btn btn-outline-primary mx-1"><i class="bi bi-pencil-square"></i></button></form><form action="registrant_do_deleteterm.php" method="post" class="mb-0"><input type="hidden" name="termid" value="' . $this->TermID . '"><button class="btn btn-outline-danger mx-1"><i class="bi bi-trash3-fill"></i></button></form></div></td>' . PHP_EOL .
                    '               </tr>' . PHP_EOL;
            }

        } else {
            $displayTerms = '<tr><td colspan="7">No terms found.</td></tr>';
        }
        $Result = "";
        return $displayTerms;
    }

    public function displayPrograms()
    {
        $Result = $this->Programs();

        $displayPrograms = '';
        if (count($Result) > 0) {
            foreach ($Result as $row) {
                $this->ProgramID = Validation::displayInput($row['ProgID']);
                $this->ProgramTitle = Validation::displayInput($row['ProgTitle']);
                $this->ProgramType = Validation::displayInput($row['ProgType']);
                $this->ProgramActive = Validation::displayInput($row['ProgActive']);
                ($this->ProgramActive === '1') ? $this->ProgramActive = 'Yes' : $this->ProgramActive = 'No';

                $displayPrograms .=
                    '               <tr>' . PHP_EOL .
                    '                   <td>' . $this->ProgramID . '</td>' . PHP_EOL .
                    '                   <td>' . $this->ProgramTitle . '</td>' . PHP_EOL .
                    '                   <td>' . $this->ProgramType . '</td>' . PHP_EOL .
                    '                   <td>' . $this->ProgramActive . '</td>' . PHP_EOL .
                    '                   <td><div class="d-flex"><form action="registrant_editprogram.php" method="post" class="mb-0"><input type="hidden" name="programid" value="' . $this->ProgramID . '"><button class="btn btn-outline-primary mx-1"><i class="bi bi-pencil-square"></i></button></form><form action="registrant_do_deleteprogram.php" method="post" class="mb-0"><input type="hidden" name="programid" value="' . $this->ProgramID . '"><button class="btn btn-outline-danger mx-1"><i class="bi bi-trash3-fill"></i></button></form></div></td>' . PHP_EOL .
                    '               </tr>' . PHP_EOL;
            }

        } else {
            $displayPrograms = '<tr><td colspan="7">No terms found.</td></tr>';
        }
        $Result = "";
        return $displayPrograms;
    }
}