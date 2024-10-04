<?php
    class Position extends QueryRepo{
        function displayPosition($dbc1){
            $parties = $this->getParty($dbc1, NULL);

            if($parties != NULL){
                foreach ($parties as $party) {
                    echo '
                        <tr>
                            <td>'.$party['Name'].'</td>
                            <td style="display: flex; column-gap: 5px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$party['ID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$party['ID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                            </td>
                        </tr>
                    ';
                }
            }
            
            
            
        }
    }

    $p = new Position();

    $p->displayPosition($dbc1);
    


?>