<?php
    class Notification{
        function displayPositionAdded(){
            echo 'PositionAdded';
            unset($_SESSION['PositionAdded']);
        }

        function displayPositionUpdated(){
            echo 'PositionUpdated';
            unset($_SESSION['PositionUpdated']);
        }

        function displayPositionDeleted(){
            echo 'PositionDeleted';
            unset($_SESSION['PositionDeleted']);
        }

        function displayPartyAdded(){
            echo 'PartyAdded';
            unset($_SESSION['PartyAdded']);
        }

        function displayPartyUpdated(){
            echo 'PartyUpdated';
            unset($_SESSION['PartyUpdated']);
        }

        function displayPartyDeleted(){
            echo 'PartyDeleted';
            unset($_SESSION['PartyDeleted']);
        }

        function displayCandidateAdded(){
            echo 'CandidateAdded';
            unset($_SESSION['CandidateAdded']);
        }

        function displayCandidateUpdated(){
            echo 'CandidateUpdated';
            unset($_SESSION['CandidateUpdated']);
        }

        function displayCandidateDeleted(){
            echo 'CandidateDeleted';
            unset($_SESSION['CandidateDeleted']);
        }

        function displayVoterAdded(){
            echo 'VoterAdded';
            unset($_SESSION['VoterAdded']);
        }

        function displayVoterUpdated(){
            echo 'VoterUpdated';
            unset($_SESSION['VoterUpdated']);
        }

        function displayVoterDeleted(){
            echo 'VoterDeleted';
            unset($_SESSION['VoterDeleted']);
        }

        function displayInvalidCredentials(){
            echo 'InvalidCredentials';
            unset($_SESSION['InvalidCredentials']);
        }

        function displayIncompleteCredentials(){
            echo 'IncompleteCredentials';
            unset($_SESSION['IncompleteCredentials']);
        }

        function displayBallotSubmitted(){
            echo 'BallotSubmitted';
            unset($_SESSION['BallotSubmitted']);
        }

        function displayUserAdded(){
            echo 'UserAdded';
            unset($_SESSION['UserAdded']);
        }

        function displayUserUpdated(){
            echo 'UserUpdated';
            unset($_SESSION['UserUpdated']);
        }

        function displayUserDeleted(){
            echo 'UserDeleted';
            unset($_SESSION['UserDeleted']);
        }
    }

    $n = new Notification();

    if(isset($_SESSION['PositionAdded'])){
        $n->displayPositionAdded();
    }

    if(isset($_SESSION['PositionUpdated'])){
        $n->displayPositionUpdated();
    }

    if(isset($_SESSION['PositionDeleted'])){
        $n->displayPositionDeleted();
    }

    if(isset($_SESSION['PartyAdded'])){
        $n->displayPartyAdded();
    }

    if(isset($_SESSION['PartyUpdated'])){
        $n->displayPartyUpdated();
    }

    if(isset($_SESSION['PartyDeleted'])){
        $n->displayPartyDeleted();
    }

    if(isset($_SESSION['CandidateAdded'])){
        $n->displayCandidateAdded();
    }

    if(isset($_SESSION['CandidateUpdated'])){
        $n->displayCandidateUpdated();
    }

    if(isset($_SESSION['CandidateDeleted'])){
        $n->displayCandidateDeleted();
    }

    if(isset($_SESSION['VoterAdded'])){
        $n->displayVoterAdded();
    }

    if(isset($_SESSION['VoterUpdated'])){
        $n->displayVoterUpdated();
    }

    if(isset($_SESSION['VoterDeleted'])){
        $n->displayVoterDeleted();
    }

    if(isset($_SESSION['InvalidCredentials'])){
        $n->displayInvalidCredentials();
    }

    if(isset($_SESSION['IncompleteCredentials'])){
        $n->displayIncompleteCredentials();
    }

    if(isset($_SESSION['BallotSubmitted'])){
        $n->displayBallotSubmitted();
    }

    if(isset($_SESSION['UserAdded'])){
        $n->displayUserAdded();
    }

    if(isset($_SESSION['UserUpdated'])){
        $n->displayUserUpdated();
    }

    if(isset($_SESSION['UserDeleted'])){
        $n->displayUserDeleted();
    }
?>