<?php

    class FacultyView extends FacultyController {

        /* --- PROPERTIES --- */
        protected $InstructorID;
        protected $FacultyFirstName;
        protected $FacultyMiddleName;
        protected $FacultyLastName;
        protected $FacultyFullName;
        protected $FacultyFullName_MI;
        protected $FacultySalutation_LastName;
        protected $FacultyDepartment;
        protected $StudentID;
        protected $StudentName;
        protected $StudentEnrolledOn;
        protected $StudentProgram;
        protected $StudentGrade;


        /* --- METHODS --- */
        
        public function __construct() {
            $this->InstructorID = $_SESSION["LinkedID"];

            $Result = $this->FacultyInfo($this->InstructorID);

            if(count($Result) === 1) {
                foreach($Result as $row) {
                    $this->InstructorID = Validation::displayInput($row["InstructorID"]);
                    $this->FacultyFirstName = Validation::displayInput($row["InstrFirstName"]);
                    $this->FacultyMiddleName = Validation::displayInput($row["InstrMiddleName"]);
                    $this->FacultyLastName = Validation::displayInput($row["InstrLastName"]);
                    $this->displayFacultyFullName = Validation::displayInput($row["FullName"]);
                    $this->FacultyFullName_MI = Validation::displayInput($row["FullName_MI"]);
                    $this->FacultySalutation_LastName = Validation::displayInput($row["Salutation_LastName"]);
                    $this->FacultyDepartment = Validation::displayInput($row["DeptName"]);
                }
            }
            $Result = "";
        }

        public function displayInstructorID() {
            return $this->InstructorID;
        }

        public function displayFacultyFirstName() {
            return $this->FacultyFirstName;
        }

        public function displayFacultyMiddleName() {
            return $this->FacultyMiddleName;
        }

        public function displayFacultyLastName() {
            return $this->FacultyLastName;
        }

        public function displayFacultyFullName() {
            return $this->FacultyFullName;
        }

        public function displayFacultyFullName_MI () {
            return $this->FacultyFullName_MI;
        }

        public function displayFacultyDepartment() {
            return $this->FacultyDepartment;
        }

        public function displayFacultyClasses($SelectedClass = NULL) {
            $Result = $this->FacultyClasses($this->InstructorID);
            $SelectedClass = Validation::displayInput($SelectedClass);
            
            $displayFacultyClasses = "";

            if(count($Result) > 0) {
                foreach($Result as $row) {
                    $ClassID = Validation::displayInput($row["ClassID"]);
                    ($ClassID === $SelectedClass) ? $selected = " selected" : $selected = "";
                    $ClassCode = Validation::displayInput($row["CourseCode"]);
                    $ClassSection = Validation::displayInput($row["ClassSection"]);
                    $ClassCodeSection = Validation::displayInput($row["ClassCode"]);
                    $ClassTitle = Validation::displayInput($row["CourseTitle"]);
                    $ClassTermStart = Validation::displayInput($row["TermStart"]);
                    $ClassTermEnd = Validation::displayInput($row["TermEnd"]);

                    $displayFacultyClasses .= '                            <option value="' . $ClassID . '"' . $selected . 
                    '>' . $ClassCodeSection . ': ' . $ClassTitle . ' (' . $ClassTermStart . '-' . $ClassTermEnd . ')</option>' . PHP_EOL;
                }
                $Result = "";
                return $displayFacultyClasses;
            }
        }

        public function displayFacultyClassRoster($ClassID, $Grades = false) {
            $Result = $this->FacultyClassRoster($this->InstructorID, $ClassID);

            $displayFacultyClassRoster = "";
            $StudentCount = 0;
            $Submit = false;

            if(count($Result) > 0) {
                foreach($Result as $row) {
                    $StudentID = Validation::displayInput($row["StudentID"]);
                    $StudentName = Validation::displayInput($row["StudentName"]);
                    $StudentProgram = Validation::displayInput($row["StudentProgram"]);
                    $StudentEnrolledOn = Validation::displayInput($row["StudentEnrolledOn"]);
                    $StudentGrade = Validation::displayInput($row["StudentGrade"]);
                    $StudentCount += 1;

                    $displayFacultyClassRoster .=
                    '                       <tr>' . PHP_EOL .
                    '                           <td>' . $StudentID . '</td>' . PHP_EOL .
                    '                           <td>' . $StudentName . '</td>' . PHP_EOL .
                    '                           <td>' . $StudentEnrolledOn . '</td>' . PHP_EOL .
                    '                           <td>' . $StudentProgram . '</td>' . PHP_EOL;
                    if($Grades === true) {
                        if($StudentGrade !== "") {
                            $displayFacultyClassRoster .= '                           <td>' . $StudentGrade . '</td>' . PHP_EOL .
                            '                       </tr>' . PHP_EOL;
                        } else {
                            $Submit = true;
                            $displayFacultyClassRoster .= '                           <td>' . PHP_EOL . '                               ' . $this->displayFacultyGradeSelect($StudentID) . PHP_EOL . '                           </td>' . PHP_EOL .
                        '                       </tr>' . PHP_EOL;
                        }
                    } else {
                        $displayFacultyClassRoster .= '                           <td><a href="javascript:alert(\'Start a chat with ' . $StudentName . '\')" class="btn btn-outline-primary me-1" title="Chat"><i class="bi bi-chat-dots-fill"></i></a>
                        <a href="javascript:alert(\'Send an email to ' . $StudentName . '\')" class="btn btn-outline-primary me-1" title="Email"><i class="bi bi-envelope-fill"></i></a>
                        <a href="javascript:alert(\'Place a phone call to ' . $StudentName . '\')" class="btn btn-outline-primary me-1" title="Phone"><i class="bi bi-telephone-fill"></i></a></td>' . PHP_EOL .
                    '                       </tr>' . PHP_EOL;
                    }
                }
                $displayFacultyClassRoster .= '                     </tbody>' . PHP_EOL .
                '                     <tfoot>' . PHP_EOL .
                '                         <tr>' . PHP_EOL .
                '                             <th colspan="4" class="table-primary">Student Count : ' . $StudentCount . '</th>' . PHP_EOL;
                if($Submit === true) {
                    $displayFacultyClassRoster .= '                             <th class="table-primary"><button class="btn btn btn-outline-success">Submit Grades</button></th>' . PHP_EOL;
                } else {
                    $displayFacultyClassRoster .= '                             <th class="table-primary"></th>' . PHP_EOL .
                '                         </tr>' . PHP_EOL .
                '                     </tfoot>' . PHP_EOL;
                }
            }
            $Grades = NULL;
            $Submit = NULL;
            $Result = NULL;
            return $displayFacultyClassRoster;
        }

        public function displayFacultyClassCount() {
            return $this->FacultyClassCount($this->InstructorID);
        }

        public function displayFacultyGradeSelect($StudentID) {
            $GradesSelect = '<select name="' . $StudentID . '" class="form-select" required>' . PHP_EOL .
            '                                   <option value="">Select Grade</option>'. PHP_EOL .
            '                                   <option value="A">A - Excellent</option>'. PHP_EOL .
            '                                   <option value="B">B - Good</option>'. PHP_EOL .
            '                                   <option value="C">C - Average</option>'. PHP_EOL .
            '                                   <option value="D">D - Poor</option>'. PHP_EOL .
            '                                   <option value="F">F - Failure</option>'. PHP_EOL .
            '                                   <option value="" disabled>- - - - - - - - - - - - - - -</option>'. PHP_EOL .
            '                                   <option value="I">I - Incomplete</option>'. PHP_EOL .
            '                                   <option value="L">L - Instructor Grade Late</option>'. PHP_EOL .
            '                                   <option value="N">N - No Pass</option>'. PHP_EOL .
            '                                   <option value="P">P - Pass</option>'. PHP_EOL .
            '                                   <option value="S">S - Satisfactory</option>'. PHP_EOL .
            '                                   <option value="U">U - Unsatisfactory</option>'. PHP_EOL .
            '                                   <option value="W">W - Withdrawal</option>'. PHP_EOL .
            '                                   <option value="X">X - Audit</option>'. PHP_EOL .
            '                              </select>'. PHP_EOL;

            return $GradesSelect;
        }
    }