<?php
    class Ballot{
        function vote($dbc1, $candidateID){
            try {
                $query = "UPDATE candidate SET Vote = (Vote + 1) WHERE ID = :candidateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':candidateID', $candidateID);
                $pdo->execute();
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function setVoted($dbc1, $id){
            try {
                $query = "UPDATE voter SET HasVoted = 1 WHERE ID = :id ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':id', $id);
                $pdo->execute();
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

    }

    $b = new Ballot();

    $id = $_SESSION['id'];

    $positions = $queryRepoMain->getPosition($dbc1, NULL);

    foreach ($positions as $position) {
        if(isset($_POST[$position['ID']])){
            if($position['Count'] > 1){
                foreach ($_POST[$position['ID']] as $candidateID) {
                    echo $candidateID.',';
                    $b->vote($dbc1, $candidateID);
                }
            }else {
                echo $candidateID = $_POST[$position['ID']];
                $b->vote($dbc1, $candidateID);
            }

            $b->setVoted($dbc1, $id);
            $_SESSION['BallotSubmitted'] = true;
        }
    }
    
    header('Location: index.php');
?>