<?php
    class Voter{
        function addVoter($dbc1, $idNumber, $name, $password){
            try {
                $query = "INSERT INTO voter (IDNumber, Name, Password)
                VALUES (:idNumber, :name, :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':name', $name);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['VoterAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateVoter($dbc1, $updateID, $idNumber, $name, $password){
            try {
                $query = "UPDATE voter SET IDNumber = :idNumber, Name = :name, Password = :password WHERE ID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':name', $name);
                $pdo->bindParam(':password', $password);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['VoterUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteVoter($dbc1, $deleteID){
            try {
                $query = "DELETE FROM voter WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['VoterDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $v = new Voter();

    if(!isset($_GET['deleteID'])){
        $idNumber = $_POST['idNumber'];
        $name = $_POST['name'];
        $password = $_POST['password'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $v->updateVoter($dbc1, $updateID, $idNumber, $name, $password);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $v->deleteVoter($dbc1, $deleteID);
    }else{
        $v->addVoter($dbc1, $idNumber, $name, $password);
    }
    
    header('Location: ?voter=true');
?>