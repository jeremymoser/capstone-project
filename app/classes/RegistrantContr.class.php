<?php

class RegistrantController extends Registrant
{

    /* --- METHODS --- */

    public function processAddClass($ClassID, $InstructorID, $Section, $TermID, $VenueID)
    {
        $this->AddClass($ClassID, $InstructorID, $Section, $TermID, $VenueID);

        header("Location: registrant_classes.php");
        exit();
    }


    public function processClassInfo($ClassID)
    {
        return $this->ClassInfo($ClassID);
    }

    public function processEditClass($ClassID, $CourseID, $InstructorID, $Section, $TermID, $VenueID, $ClassActive)
    {
        $this->EditClass($ClassID, $CourseID, $InstructorID, $Section, $TermID, $VenueID, $ClassActive);

        unset($_SESSION['ClassID']);
        unset($_SESSION['CourseID']);
        unset($_SESSION['InstructorID']);
        unset($_SESSION['ClassSection']);
        unset($_SESSION['ClassTerm']);
        unset($_SESSION['ClassVenue']);
        unset($_SESSION['ClassActive']);

        header("Location: registrant_classes.php");
        exit();

    }
    public function processDeleteClass($ClassID)
    {
        $this->DeleteClass($ClassID);

        header("Location: registrant_classes.php");
        exit();
    }
    
    
    public function processAddTerm($TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive)
    {
        $this->AddTerm($TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive);
        
        header("Location: registrant_terms.php");
        exit();
        
    }
    
    public function processTermInfo($TermID)
    {
        $this->TermInfo($TermID);
    }
    
    public function processEditTerm($TermID, $TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive)
    {
        $this->EditTerm($TermID, $TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive);

        unset($_SESSION['TermID']);
        unset($_SESSION['TermTitle']);
        unset($_SESSION['TermSection']);
        unset($_SESSION['TermStart']);
        unset($_SESSION['TermEnd']);
        unset($_SESSION['TermActive']);

        header("Location: registrant_terms.php");
        exit();
    }

    public function processAddCourse($CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive) {
        $this->AddCourse($CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive);

        header("Location: registrant_courses.php");
        exit();
    }

    public function processCourseInfo($CourseID)
    {
        $this->CourseInfo($CourseID);
    }

    public function processEditCourse($CourseID, $CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive)
    {
        $this->EditCourse($CourseID, $CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive);

        unset($_SESSION['CourseID']);
        unset($_SESSION['CourseCode']);
        unset($_SESSION['CourseTitle']);
        unset($_SESSION['CourseCredit']);
        unset($_SESSION['CourseDepartment']);
        unset($_SESSION['CourseFee']);
        unset($_SESSION['CourseActive']);

        header('Location: registrant_courses.php');
        exit();
    }

    public function processDeleteCourse($CourseID)
    {
        $this->DeleteCourse($CourseID);
        
        header("Location: registrant_courses.php");
        exit();
    }

    public function processAddProgram($ProgramTitle, $ProgramType, $ProgramActive) {
        $this->AddProgram($ProgramTitle, $ProgramType, $ProgramActive);

        header("Location: registrant_programs.php");
        exit();
    }

    public function processEditProgram($ProgramID, $ProgramTitle, $ProgramType, $ProgramActive) {
        $this->EditProgram($ProgramID, $ProgramTitle, $ProgramType, $ProgramActive);

        unset($_SESSION['ProgramID']);
        unset($_SESSION['ProgramTitle']);
        unset($_SESSION['ProgramType']);
        unset($_SESSION['ProgramActive']);
        
        header("Location: registrant_programs.php");
        exit();
    }
    public function processProgramInfo($ProgramID)
    {
        $this->ProgramInfo($ProgramID);
    }

    public function processDeleteProgram($ProgramID)
    {
        $this->DeleteProgram($ProgramID);
        
        header("Location: registrant_programs.php");
        exit();
    }
    
    public function processDeleteTerm($TermID)
    {
        $this->DeleteTerm($TermID);
        
        header("Location: registrant_terms.php");
        exit();
    }

    public function processAddVenue($Building, $Room, $VenueActive) {
        $this->AddVenue($Building, $Room, $VenueActive);

        header("Location: registrant_venues.php");
        exit();
    }

    public function processVenueInfo($VenueID)
    {
        $this->VenueInfo($VenueID);
    }
    
    public function processEditVenue($VenueID, $Building, $Room, $VenueActive)
    {
        $this->EditVenue($VenueID, $Building, $Room, $VenueActive);

        unset($_SESSION['VenueTitle']);
        unset($_SESSION['Building']);
        unset($_SESSION['Room']);
        unset($_SESSION['VenueActive']);

        header("Location: registrant_venues.php");
        exit();
    }

    public function processDeleteVenue($VenueID)
    {
        $this->DeleteVenue($VenueID);

        header("Location: registrant_venues.php");
        exit();
    }
}