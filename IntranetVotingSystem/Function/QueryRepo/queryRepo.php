<?php
    class QueryRepo {
        function getPosition($dbc1, $id){
            $query = "SELECT * FROM position";
            if($id != NULL) {
                $query = $query . " WHERE ID = :id";
            }
            $query = $query . " ORDER BY Decree";
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

        function getCandidate($dbc1, $positionID, $count){
            $query = "SELECT * FROM candidateview ";
            if($positionID != NULL AND $count != NULL) {
                $query = $query . " WHERE PositionID = :positionID ORDER BY Vote DESC, Name limit $count ";
            }else {
                $query = $query . " ORDER BY Decree, Vote DESC, Name";
            }
            $pdo = $dbc1->prepare($query);
            if($positionID != NULL AND $count != NULL) {
                $pdo->bindParam(':positionID', $positionID);
            }
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

        function getUser($dbc1){
            $query = "SELECT * FROM user ORDER BY FirstName";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $users = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $users[$count] = array(
                    'ID' => $row['ID'],
                    'FirstName' => $row['FirstName'],
                    'Surname' => $row['Surname'],
                    'Username' => $row['Username'],
                    'Password' => $row['Password'],
                );

                $count++;
            }

            return $users;
        }

        function getTableTotalRowCount($dbc1) {
            $query = "SELECT * FROM tablestotalrowcountview ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $total = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $total[$count] = array(
                    'PositionCount' => $row['PositionCount'],
                    'PartyCount' => $row['PartyCount'],
                    'CandidateCount' => $row['CandidateCount'],
                    'VoterCount' => $row['VoterCount'],
                );

                $count++;
            }

            return $total;
        }

        function getParticipant($dbc1) {
            $query = "SELECT * FROM participantview ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $participants = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $participants[$count] = array(
                    'VoterCount' => $row['VoterCount'],
                    'NonVoterCount' => $row['NonVoterCount'],
                );

                $count++;
            }

            return $participants;
        }

        function key(){
            return "KLPR-P*OE-%LED-QA!R-JJFR";
        }

    }

    $queryRepoMain = new QueryRepo();



?>