<?php
    class Position extends QueryRepo{
        function displayPosition($dbc1){
            $positions = $this->getPosition($dbc1, NULL);

            foreach ($positions as $position) {
                echo '
                    <tr>
                        <td>'.$position['Name'].'</td>
                        <td>'.$position['Decree'].'</td>
                        <td>'.$position['Count'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$position['ID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$position['ID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $p = new Position();

    $p->displayPosition($dbc1);
    


?>