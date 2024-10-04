<?php
    class main{
        // Main Pages
        public function login($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/login.php';
        }

        public function dashboard($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/dashboard.php';
        }

        public function position($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/position.php';
        }

        public function party($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/party.php';
        }

        public function candidate($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/candidate.php';
        }

        public function voter($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/voter.php';
        }
        
        public function User($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/user.php';
        }

        public function ballot($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/ballot.php';
        }

        public function elected($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/elected.php';
        }

        public function result($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/UI/result.php';
        }

        // Functions

        public function loginFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/login.php';
        }

        public function positionFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/position.php';
        }

        public function partyFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/party.php';
        }

        public function candidateFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/candidate.php';
        }

        public function userFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/user.php';
        }

        public function voterFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/voter.php';
        }

        public function ballotFunction($dbc1, $dbc2, $queryRepoMain) {
            include 'IntranetVotingSystem/Function/ballot.php';
        }

        public function queryRepo($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/QueryRepo/queryRepo.php';
            return $queryRepoMain;
        }

        public function notification($dbc1, $dbc2) {
            include 'IntranetVotingSystem/UI/UIParts/notification.php';
        }

        public function logoutFunction($dbc1, $dbc2) {
            include 'IntranetVotingSystem/Function/logoutFunction.php';
        }

        public function checkMaintenance($dbc1, $dbc2) {
            $query = "SELECT * FROM Mode ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();

            $row = $pdo->fetch(PDO::FETCH_ASSOC);

            $_SESSION['Mode'] = $row['Mode'];
        }

        public function maintenance() {
            header("Location: IntranetVotingSystem/Maintenance/maintenance.html");
        }

        public function error() {
            header("Location: IntranetVotingSystem/Error/error.html");
        }

        /*************  KEY AND CONNECTION  ************** */

        function key() {
            include 'CPort/Function/Key/key.php';
        }

        public function queryGenerator($dbc1, $dbc2) {
            include 'CPort/Function/QueryGenerator/queryGenerator.php';
        }

        function connection1(){
            $connection1 = 'true';
			include 'IntranetVotingSystem/Connection/connect.php';
			return $dbc1;
        }
        
        function connection2(){
            $connection2 = 'true';
			include 'IntranetVotingSystem/Connection/connect.php';
			return $dbc2;
		}

    }

    $main = new main;

    ob_start();
    session_start();
    
    header("Expires: Tue, 01 Jan 2050 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    date_default_timezone_set("Asia/Manila");
    $_SESSION['dateAndTimeER'] = date('Y/m/d h:i:s A');
    $_SESSION['dateER'] = date('Y/m/d');
    $_SESSION['timeER'] = date('h:i:s A');

    $_SESSION['dayER'] = date('d');

    //$main->key();

    if(isset($_GET['error'])){
        $main->error();
        exit();
    }

    $dbc1 = $main->connection1();
    $dbc2 = $main->connection2();

    $queryRepoMain = $main->queryRepo($dbc1, $dbc2);

    // Main Pages
    if(isset($_GET['dashboard'])){
        $main->dashboard($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['position'])){
        $main->position($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['party'])){
        $main->party($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['candidate'])){
        $main->candidate($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['voter'])){
        $main->voter($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['ballot'])){
        $main->ballot($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['user'])){
        $main->user($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['elected'])){
        $main->elected($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['result'])){
        $main->result($dbc1, $dbc2, $queryRepoMain);
    }

    // Functions
    else if(isset($_GET['loginFunction'])){
        $main->loginFunction($dbc1, $dbc2);
    }else if(isset($_GET['positionFunction'])){
        $main->positionFunction($dbc1, $dbc2);
    }else if(isset($_GET['partyFunction'])){
        $main->partyFunction($dbc1, $dbc2);
    }else if(isset($_GET['candidateFunction'])){
        $main->candidateFunction($dbc1, $dbc2);
    }else if(isset($_GET['voterFunction'])){
        $main->voterFunction($dbc1, $dbc2);
    }else if(isset($_GET['userFunction'])){
        $main->userFunction($dbc1, $dbc2);
    }else if(isset($_GET['ballotFunction'])){
        $main->ballotFunction($dbc1, $dbc2, $queryRepoMain);
    }


    // Parts
    else if(isset($_GET['notification'])){
        $main->notification($dbc1, $dbc2);
    }
    
    else{
        $main->login($dbc1, $dbc2, $queryRepoMain);
    }


?>