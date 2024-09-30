<?php
    class Candidate{
        function addCandidate($dbc1, $candidate, $photoTmp, $path, $positionID, $partyID){
            try {
                $query = "INSERT INTO candidate (Name, PhotoURL, PositionID, PartyID)
                VALUES (:candidate, :photoURL, :positionID, :partyID) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':candidate', $candidate);
                $pdo->bindParam(':photoURL', $path);
                $pdo->bindParam(':positionID', $positionID);
                $pdo->bindParam(':partyID', $partyID);
                $pdo->execute();

                $this->upload($photoTmp, $path);

                $_SESSION['CandidateAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateCandidate($dbc1, $updateID, $candidate, $photoTmp, $path, $positionID, $partyID){
            try {
                $query = "UPDATE candidate SET Name = :candidate, PositionID = :positionID, PartyID = :partyID";
                if($photoTmp != NULL) {
                    $query = $query . ", PhotoURL = :photoURL";
                }
                $query = $query . " WHERE ID = :updateID ";

                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':candidate', $candidate);
                $pdo->bindParam(':positionID', $positionID);
                $pdo->bindParam(':partyID', $partyID);
                $pdo->bindParam(':updateID', $updateID);
                if($photoTmp != NULL) {
                    $pdo->bindParam(':photoURL', $path);
                }
                $pdo->execute();
                
                if($photoTmp != NULL) {
                    $this->upload($photoTmp, $path);
                }
                
                $_SESSION['CandidateUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteCandidate($dbc1, $deleteID){
            try {
                $query = "SELECT * FROM candidate WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $row = $pdo->fetch();

                $query = "DELETE FROM candidate WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                if(isset($row['PhotoURL'])) {
                    $this->unload($row['PhotoURL']);
                }

                $_SESSION['CandidateDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }

        function upload($logoTmp, $path){
            move_uploaded_file($logoTmp, $path);
        }

        function unload($path){
            if(file_exists($path)){
                unlink($path);
            }
        }
    }

    $c = new Candidate();

    $location = 'IntranetVotingSystem/Image/Candidate/';

    if(!isset($_GET['deleteID'])){
        $candidate = $_POST['candidate'];
        $positionID = $_POST['position'];
        $partyID = $_POST['party'];

        $photoType = $_FILES['candidateImg']['type'];
        $photoTmp = $_FILES['candidateImg']['tmp_name'];
        $photoSize = $_FILES['candidateImg']['size'];
        $photo = $_FILES['candidateImg']['name'];

        $path = $location.$photo;
    }
    
    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $c->updateCandidate($dbc1, $updateID, $candidate, $photoTmp, $path, $positionID, $partyID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $c->deleteCandidate($dbc1, $deleteID);
    }else{
        $c->addCandidate($dbc1, $candidate, $photoTmp, $path, $positionID, $partyID);
    }
    
    header('Location: ?candidate=true');
?>