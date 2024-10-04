<?php
    class Participant extends QueryRepo{
        function displayParticipant($dbc1){
            $participants = $this->getParticipant($dbc1);

            foreach ($participants as $participant) {
                echo $participant['VoterCount'].',';
                echo $participant['NonVoterCount'].',';
            }
            echo '0,';
        }
    }

    $p = new Participant();

    $p->displayParticipant($dbc1);
?>