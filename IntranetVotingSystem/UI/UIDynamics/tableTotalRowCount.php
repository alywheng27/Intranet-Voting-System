<?php
    class TableTotalRowCount extends QueryRepo{
        function displayTableTotalRowCount($dbc1){
            $total = $this->getTableTotalRowCount($dbc1);

            foreach ($total as $count) {
                echo $count['PositionCount'].',';
                echo $count['PartyCount'].',';
                echo $count['CandidateCount'].',';
                echo $count['VoterCount'].',';
            }
            echo '0,';
        }
    }

    $ttrc = new TableTotalRowCount();

    $ttrc->displayTableTotalRowCount($dbc1);
?>