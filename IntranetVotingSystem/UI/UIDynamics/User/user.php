<?php
    class User extends QueryRepo{
        function displayUser($dbc1){
            $users = $this->getUser($dbc1, NULL);

            foreach ($users as $user) {
                echo '
                    <tr>
                        <td>'.$user['FirstName'].'</td>
                        <td>'.$user['Surname'].'</td>
                        <td>'.$user['Username'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$user['ID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$user['ID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $u = new User();

    $u->displayUser($dbc1);
    


?>