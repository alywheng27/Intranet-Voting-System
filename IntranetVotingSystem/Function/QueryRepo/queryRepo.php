<?php
    class QueryRepo {
        function getPosition($dbc1, $id){
            $query = "SELECT * FROM position";
            if($id != NULL) {
                $query = $query . " WHERE ID = :id";
            }
            $query = $query . " ORDER BY Decree, Count";
            $pdo = $dbc1->prepare($query);
            if($id != NULL) {
                $pdo->bindParam(':id', $id);
            }
            $pdo->execute();

            $positions = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $positions[$count] = array(
                    'ID' => $row['ID'],
                    'Name' => $row['Name'],
                    'Decree' => $row['Decree'],
                    'Count' => $row['Count']
                );

                $count++;
            }

            return $positions;
        }

        function getParty($dbc1, $id){
            $query = "SELECT * FROM party";
            if($id != NULL) {
                $query = $query . " WHERE ID = :id";
            }
            $query = $query . " ORDER BY ID, Name";
            $pdo = $dbc1->prepare($query);
            if($id != NULL) {
                $pdo->bindParam(':id', $id);
            }
            $pdo->execute();
            
            $parties = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $parties[$count] = array(
                    'ID' => $row['ID'],
                    'Name' => $row['Name'],
                    'LogoURL' => $row['LogoURL'],
                );

                $count++;
            }

            return $parties;
        }

        function getCandidate($dbc1){
            $query = "SELECT * FROM candidate ORDER BY Name";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $candidates = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $candidates[$count] = array(
                    'ID' => $row['ID'],
                    'Name' => $row['Name'],
                    'PhotoURL' => $row['PhotoURL'],
                    'PositionID' => $row['PositionID'],
                    'PartyID' => $row['PartyID'],
                    'Vote' => $row['Vote'],
                );

                $count++;
            }

            return $candidates;
        }

        function getVoter($dbc1){
            $query = "SELECT * FROM voter ORDER BY Name";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $voters = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $voters[$count] = array(
                    'ID' => $row['ID'],
                    'IDNumber' => $row['IDNumber'],
                    'Name' => $row['Name'],
                    'Password' => $row['Password'],
                    'HasVoted' => $row['HasVoted'],
                );

                $count++;
            }

            return $voters;
        }

        function key(){
            return "KLPR-P*OE-%LED-QA!R-JJFR";
        }

        //  GETDATE()
        //  DateActive <= DATEADD(MINUTE, -5, GETDATE())

    }

    $queryRepoMain = new QueryRepo();



?>