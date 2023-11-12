<?php

class Registrant extends Database
{

    /* --- METHODS --- */

    protected function RegistrantClasses($Departments, $Instructors, $Terms, $Building)
    {
        $sql = "CALL SP_Registrant_Classes (:Departments, :Instructors, :Terms, :Building);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':Departments', $Departments, PDO::PARAM_STR);
        $stmt->bindParam(':Instructors', $Instructors, PDO::PARAM_STR);
        $stmt->bindParam(':Terms', $Terms, PDO::PARAM_STR);
        $stmt->bindParam(':Building', $Building, PDO::PARAM_STR);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function RegistrantCourses($CourseCode, $CourseTitle, $Department)
    {
        $sql = "CALL SP_Registrant_Courses (:CourseCode, :CourseTitle, :Department);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':CourseCode', $CourseCode, PDO::PARAM_STR);
        $stmt->bindParam(':CourseTitle', $CourseTitle, PDO::PARAM_STR);
        $stmt->bindParam(':Department', $Department, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function DeptFilter()
    {
        $sql = "CALL SP_Registrant_DeptFilter();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function InstrFilter()
    {
        $sql = "CALL SP_Registrant_InstrFilter();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function TermFilter()
    {
        $sql = "CALL SP_Registrant_TermFilter();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function VenueFilter()
    {
        $sql = "CALL SP_Registrant_VenueFilter();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }


    protected function ClassCourses()
    {
        $sql = "CALL SP_Registrant_ClassCourses();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }
    protected function ClassInstructors()
    {
        $sql = "CALL SP_Registrant_ClassInstructors();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function ClassTerms()
    {
        $sql = "CALL SP_Registrant_ClassTerms();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function ClassVenues()
    {
        $sql = "CALL SP_Registrant_ClassVenues();";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function AddClass($ClassID, $InstructorID, $Section, $TermID, $VenueID)
    {
        $sql = "CALL SP_Registrant_AddClass(:ClassID, :InstructorID, :Section, :TermID, :VenueID);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":ClassID", $ClassID, PDO::PARAM_INT);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->bindParam(":Section", $Section, PDO::PARAM_INT);
        $stmt->bindParam(":TermID", $TermID, PDO::PARAM_INT);
        $stmt->bindParam(":VenueID", $VenueID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Class Added";
        $_SESSION["AlertMessage"] = "The class has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function ClassInfo($ClassID)
    {
        $sql = "CALL SP_Registrant_ClassInfo(:ClassID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':ClassID', $ClassID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION['ClassID'] = Validation::displayInput($row['ClassID']);
                $_SESSION['Course'] = Validation::displayInput($row['Course']);
                $_SESSION['Instructor'] = Validation::displayInput($row['Instructor']);
                $_SESSION['ClassSection'] = Validation::displayInput($row['ClassSection']);
                $_SESSION['ClassTerm'] = Validation::displayInput($row['ClassTerm']);
                $_SESSION['ClassVenue'] = Validation::displayInput($row['ClassVenue']);
                $_SESSION["ClassActive"] = Validation::displayInput($row["ClassActive"]);
            }
        }
        $sql = NULL;
        $stmt = NULL;
    }

    protected function EditClass($ClassID, $CourseID, $InstructorID, $Section, $TermID, $VenueID, $ClassActive)
    {
        $sql = "CALL SP_Registrant_EditClass(:ClassID, :CourseID, :InstructorID, :Section, :TermID, :VenueID, :ClassActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":ClassID", $ClassID, PDO::PARAM_INT);
        $stmt->bindParam(":CourseID", $CourseID, PDO::PARAM_INT);
        $stmt->bindParam(":InstructorID", $InstructorID, PDO::PARAM_INT);
        $stmt->bindParam(":Section", $Section, PDO::PARAM_INT);
        $stmt->bindParam(":TermID", $TermID, PDO::PARAM_INT);
        $stmt->bindParam(":VenueID", $VenueID, PDO::PARAM_INT);
        $stmt->bindParam(":ClassActive", $ClassActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Class Updated";
        $_SESSION["AlertMessage"] = "The class has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function DeleteClass($ClassID)
    {
        $sql = "CALL SP_Registrant_DeleteClass(:ClassID);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":ClassID", $ClassID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Class Deactivated";
        $_SESSION["AlertMessage"] = "The class has been deactivated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }
    
    protected function AddCourse($CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive)
    {
        $sql = "CALL SP_Registrant_AddCourse(:CourseCode, :CourseTitle, :CourseCredit, :CourseDepartment, :CourseFee, :CourseActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":CourseCode", $CourseCode, PDO::PARAM_STR);
        $stmt->bindParam(":CourseTitle", $CourseTitle, PDO::PARAM_STR);
        $stmt->bindParam(":CourseCredit", $CourseCredit, PDO::PARAM_INT);
        $stmt->bindParam(":CourseDepartment", $CourseDepartment, PDO::PARAM_INT);
        $stmt->bindParam(":CourseFee", $CourseFee, PDO::PARAM_INT);
        $stmt->bindParam(":CourseActive", $CourseActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Course Added";
        $_SESSION["AlertMessage"] = "Course has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function CourseInfo($CourseID)
    {
        $sql = "CALL SP_Registrant_CourseInfo(:CourseID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':CourseID', $CourseID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION['CourseID'] = Validation::displayInput($row['CourseID']);
                $_SESSION['CourseCode'] = Validation::displayInput($row['CourseCode']);
                $_SESSION['CourseTitle'] = Validation::displayInput($row['CourseTitle']);
                $_SESSION['CourseCredit'] = Validation::displayInput($row['CourseCredit']);
                $_SESSION['CourseDepartment'] = Validation::displayInput($row['CourseDepartment']);
                $_SESSION['CourseFee'] = Validation::displayInput($row['CourseFee']);
                $_SESSION["CourseActive"] = Validation::displayInput($row["CourseActive"]);
            }
        }
        $sql = NULL;
        $stmt = NULL;
    }
    
    protected function EditCourse($CourseID, $CourseCode, $CourseTitle, $CourseCredit, $CourseDepartment, $CourseFee, $CourseActive)
    {
        $sql = "CALL SP_Registrant_EditCourse(:CourseID, :CourseCode, :CourseTitle, :CourseCredit, :CourseDepartment, :CourseFee, :CourseActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":CourseID", $CourseID, PDO::PARAM_INT);
        $stmt->bindParam(":CourseCode", $CourseCode, PDO::PARAM_STR);
        $stmt->bindParam(":CourseTitle", $CourseTitle, PDO::PARAM_STR);
        $stmt->bindParam(":CourseCredit", $CourseCredit, PDO::PARAM_INT);
        $stmt->bindParam(":CourseDepartment", $CourseDepartment, PDO::PARAM_INT);
        $stmt->bindParam(":CourseFee", $CourseFee, PDO::PARAM_INT);
        $stmt->bindParam(":CourseActive", $CourseActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Course Updated";
        $_SESSION["AlertMessage"] = $CourseCode . ": " . $CourseTitle . "(ID# " . $CourseID . ") has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }
    protected function DeleteCourse($CourseID)
    {
        $sql = "CALL SP_Registrant_DeleteCourse(:CourseID);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":CourseID", $CourseID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Course Deactivated";
        $_SESSION["AlertMessage"] = "The course has been deactivated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function Programs()
    {
        $sql = "CALL SP_Registrant_Programs()";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function AddProgram($ProgramTitle, $ProgramType, $ProgramActive)
    {
        $sql = "CALL SP_Registrant_AddProgram(:ProgramTitle, :ProgramType, :ProgramActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":ProgramTitle", $ProgramTitle, PDO::PARAM_STR);
        $stmt->bindParam(":ProgramType", $ProgramType, PDO::PARAM_STR);
        $stmt->bindParam(":ProgramActive", $ProgramActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Program Added";
        $_SESSION["AlertMessage"] = "Program has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function ProgramInfo($ProgramID)
    {
        $sql = "CALL SP_Registrant_ProgramInfo(:ProgramID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':ProgramID', $ProgramID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION['ProgramID'] = Validation::displayInput($row['ProgID']);
                $_SESSION['ProgramTitle'] = Validation::displayInput($row['ProgTitle']);
                $_SESSION['ProgramType'] = Validation::displayInput($row['ProgType']);
                $_SESSION['ProgramActive'] = Validation::displayInput($row['ProgActive']);
            }
        }
        $sql = NULL;
        $stmt = NULL;
    }
    protected function EditProgram($ProgramID, $ProgramTitle, $ProgramType, $ProgramActive)
    {
        $sql = "CALL SP_Registrant_EditProgram(:ProgramID, :ProgramTitle, :ProgramType, :ProgramActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":ProgramID", $ProgramID, PDO::PARAM_INT);
        $stmt->bindParam(":ProgramTitle", $ProgramTitle, PDO::PARAM_STR);
        $stmt->bindParam(":ProgramType", $ProgramType, PDO::PARAM_STR);
        $stmt->bindParam(":ProgramActive", $ProgramActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Program Updated";
        $_SESSION["AlertMessage"] = $ProgramTitle . " - " . $ProgramType . " (ID# " . $ProgramID . ") has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function DeleteProgram($ProgramID)
    {
        $sql = "CALL SP_Registrant_DeleteProgram(:ProgramID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':ProgramID', $ProgramID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Program Deactivated";
        $_SESSION["AlertMessage"] = "Program ID# " . $ProgramID . " has been deactivated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function Terms()
    {
        $sql = "CALL SP_Registrant_Terms()";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function AddTerm($TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive)
    {
        $sql = "CALL SP_Registrant_AddTerm(:TermTitle, :TermSection, :TermStart, :TermEnd, :TermActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":TermTitle", $TermTitle, PDO::PARAM_STR);
        $stmt->bindParam(":TermSection", $TermSection, PDO::PARAM_STR);
        $stmt->bindParam(":TermStart", $TermStart, PDO::PARAM_STR);
        $stmt->bindParam(":TermEnd", $TermEnd, PDO::PARAM_STR);
        $stmt->bindParam(":TermActive", $TermActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Term Added";
        $_SESSION["AlertMessage"] = $TermTitle . " - " . $TermSection . " has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function TermInfo($TermID)
    {
        $sql = "CALL SP_Registrant_TermInfo(:TermID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':TermID', $TermID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION['TermID'] = Validation::displayInput($row['TermID']);
                $_SESSION['TermTitle'] = Validation::displayInput($row['TermTitle']);
                $_SESSION['TermSection'] = Validation::displayInput($row['TermSection']);
                $_SESSION['TermStart'] = Validation::displayInput($row['TermStart']);
                $_SESSION['TermEnd'] = Validation::displayInput($row['TermEnd']);
                $_SESSION['TermActive'] = Validation::displayInput($row['TermActive']);
            }
        }
        $sql = NULL;
        $stmt = NULL;
    }

    protected function EditTerm($TermID, $TermTitle, $TermSection, $TermStart, $TermEnd, $TermActive)
    {
        $sql = "CALL SP_Registrant_EditTerm(:TermID, :TermTitle, :TermSection, :TermStart, :TermEnd, :TermActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":TermID", $TermID, PDO::PARAM_INT);
        $stmt->bindParam(":TermTitle", $TermTitle, PDO::PARAM_STR);
        $stmt->bindParam(":TermSection", $TermSection, PDO::PARAM_STR);
        $stmt->bindParam(":TermStart", $TermStart, PDO::PARAM_STR);
        $stmt->bindParam(":TermEnd", $TermEnd, PDO::PARAM_STR);
        $stmt->bindParam(":TermActive", $TermActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Term Updated";
        $_SESSION["AlertMessage"] = $TermTitle . " - " . $TermSection . " (ID# " . $TermID . ") has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function DeleteTerm($TermID)
    {
        $sql = "CALL SP_Registrant_DeleteTerm(:TermID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':TermID', $TermID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Term Deactivated";
        $_SESSION["AlertMessage"] = "Term ID# " . $TermID . " has been deactivated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function Venues()
    {
        $sql = "CALL SP_Registrant_Venues()";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        $sql = NULL;
        $stmt = NULL;
        return $Result;
    }

    protected function AddVenue($Building, $Room, $VenueActive)
    {
        $sql = "CALL SP_Registrant_AddVenue(:Building, :Room, :VenueActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":Building", $Building, PDO::PARAM_STR);
        $stmt->bindParam(":Room", $Room, PDO::PARAM_STR);
        $stmt->bindParam(":VenueActive", $VenueActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Venue Added";
        $_SESSION["AlertMessage"] = "Venue has been added successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function VenueInfo($VenueID)
    {
        $sql = "CALL SP_Registrant_VenueInfo(:VenueID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':VenueID', $VenueID, PDO::PARAM_INT);
        $stmt->execute();

        $Result = $stmt->fetchAll();

        if (count($Result) === 1) {
            foreach ($Result as $row) {
                $_SESSION['VenueID'] = Validation::displayInput($row['VenueID']);
                $_SESSION['Building'] = Validation::displayInput($row['Building']);
                $_SESSION['Room'] = Validation::displayInput($row['Room']);
                $_SESSION['VenueActive'] = Validation::displayInput($row['VenueActive']);
            }
        }
        $sql = NULL;
        $stmt = NULL;
    }

    protected function EditVenue($VenueID, $Building, $Room, $VenueActive)
    {
        $sql = "CALL SP_Registrant_EditVenue(:VenueID, :Building, :Room, :VenueActive);";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(":VenueID", $VenueID, PDO::PARAM_INT);
        $stmt->bindParam(":Building", $Building, PDO::PARAM_STR);
        $stmt->bindParam(":Room", $Room, PDO::PARAM_STR);
        $stmt->bindParam(":VenueActive", $VenueActive, PDO::PARAM_BOOL);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Venue Updated";
        $_SESSION["AlertMessage"] = $Building . " - " . $Room . " (ID# " . $VenueID . ") has been updated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }

    protected function DeleteVenue($VenueID)
    {
        $sql = "CALL SP_Registrant_DeleteVenue(:VenueID)";
        $stmt = $this->connectPDO()->prepare($sql);
        $stmt->bindParam(':VenueID', $VenueID, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION["Alert"] = true;
        $_SESSION["AlertType"] = "success";
        $_SESSION["AlertIcon"] = "bi bi-check-circle-fill";
        $_SESSION["AlertTitle"] = "Program Deactivated";
        $_SESSION["AlertMessage"] = "Venue ID# " . $VenueID . " has been deactivated successfully.";

        $sql = NULL;
        $stmt = NULL;
    }
}