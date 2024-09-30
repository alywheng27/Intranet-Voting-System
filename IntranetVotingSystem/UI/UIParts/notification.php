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
?>