<?php
    class UserModal extends QueryRepo{
        function displayUser($dbc1){
            $users = $this->getUser($dbc1);

            foreach ($users as $user) {
                echo '
                    <div class="modal fade" id="edit'.$user['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Position</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?userFunction=true&updateID='.$user['ID'].'" method="post">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" value="'.$user['FirstName'].'" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Last Name</label>
                                        <input type="text" name="surname" value="'.$user['Surname'].'" id="surname" class="form-control" placeholder="Surname" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" value="'.$user['Username'].'" id="username" class="form-control" placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="'.$user['Password'].'" id="password" class="form-control" placeholder="Password" autocomplete="off">
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
      
                    <div class="modal fade" id="delete'.$user['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Position</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this position?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?userFunction=true&deleteID='.$user['ID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $pm = new UserModal();

    $pm->displayUser($dbc1);
    


?>