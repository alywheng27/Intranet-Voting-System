<?php
    class Party{
        function addParty($dbc1, $party, $logo, $logoTmp, $path){
            try {
                $query = "INSERT INTO party (Name, LogoURL)
                VALUES (:party, :logoURL) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':party', $party);
                $pdo->bindParam(':logoURL', $path);
                $pdo->execute();

                $this->upload($logoTmp, $path);

                $_SESSION['PartyAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateParty($dbc1, $updateID, $party, $logo, $logoTmp, $path){
            try {
                $query = "UPDATE party SET Name = :party";
                if($logo != NULL) {
                    $query = $query . ", LogoURL = :logoURL";
                }
                $query = $query . " WHERE ID = :updateID ";

                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':party', $party);
                $pdo->bindParam(':updateID', $updateID);
                if($logo != NULL) {
                    $pdo->bindParam(':logoURL', $path);
                }
                
                $pdo->execute();
                
                if($logo != NULL) {
                    $this->upload($logoTmp, $path);
                }
                
                $_SESSION['PartyUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteParty($dbc1, $deleteID){
            try {
                $query = "SELECT * FROM party WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $row = $pdo->fetch();

                $query = "DELETE FROM party WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                if(isset($row['LogoURL'])) {
                    $this->unload($row['LogoURL']);
                }

                $_SESSION['PartyDeleted'] = true;
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

    $p = new Party();

    $location = 'IntranetVotingSystem/Image/Logo/';

    if(!isset($_GET['deleteID'])){
        $party = $_POST['party'];

        $logoType = $_FILES['partyImg']['type'];
        $logoTmp = $_FILES['partyImg']['tmp_name'];
        $logoSize = $_FILES['partyImg']['size'];
        $logo = $_FILES['partyImg']['name'];

        $path = $location.$logo;
    }
    
    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $p->updateParty($dbc1, $updateID, $party, $logo, $logoTmp, $path);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $p->deleteParty($dbc1, $deleteID);
    }else{
        $p->addParty($dbc1, $party, $logo, $logoTmp, $path);
    }
    
    header('Location: ?party=true');
?>