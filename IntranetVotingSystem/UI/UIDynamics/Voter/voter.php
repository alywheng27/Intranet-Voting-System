<?php
    class Voter extends QueryRepo{
        function displayVoter($dbc1){
            $voters = $this->getVoter($dbc1, NULL);

            if($voters != NULL){
                foreach ($voters as $voter) {
                    echo '
                        <tr>
                            <td>'.$voter['IDNumber'].'</td>
                            <td>'.$voter['Name'].'</td>';
                            if($voter['HasVoted'] == 0){
                                echo '<td>No</td>';
                            }else {
                                echo '<td>Yes</td>';
                            }
                            
                            echo '<td style="display: flex; column-gap: 5px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$voter['ID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$voter['ID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                            </td>
                        </tr>
                    ';
                }
            }
            
            
            
        }
    }

    $v = new Voter();

    $v->displayVoter($dbc1);
    


?>