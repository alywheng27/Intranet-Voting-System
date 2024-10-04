<?php
    class Candidate extends QueryRepo{
        function displayCandidate($dbc1){
            $candidates = $this->getCandidate($dbc1, NULL, NULL);

            foreach ($candidates as $candidate) {
                $position = $this->getPosition($dbc1, $candidate['PositionID']);
                $party = $this->getParty($dbc1, $candidate['PartyID']);

                echo '
                    <tr>
                        <td>'.$candidate['Name'].'</td>
                        <td>'.$position[0]['Name'].'</td>
                        <td>'.$party[0]['Name'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$candidate['ID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$candidate['ID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $c = new Candidate();

    $c->displayCandidate($dbc1);
    


?>