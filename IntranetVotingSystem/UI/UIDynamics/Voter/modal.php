<?php
    class VoterModal extends QueryRepo{
        function displayVoterModal($dbc1){
            $voters = $this->getVoter($dbc1);

            foreach ($voters as $voter) {
                echo '
                    <div class="modal fade" id="edit'.$voter['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Party</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="voterQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?voterFunction=true&updateID='.$voter['ID'].'" method="post">
                                    <div class="form-group">
                                        <label for="idNumber'.$voter['ID'].'">ID Number</label>
                                        <input type="text" name="idNumber" id="idNumber'.$voter['ID'].'" value="'.$voter['IDNumber'].'" class="form-control" placeholder="ID Number" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="name'.$voter['ID'].'">Name</label>
                                        <input type="text" name="name" id="name'.$voter['ID'].'" value="'.$voter['Name'].'" class="form-control" placeholder="Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password'.$voter['ID'].'">Password</label>
                                        <input type="password" name="password" id="password'.$voter['ID'].'" value="'.$voter['Password'].'" class="form-control" placeholder="Password" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$voter['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Party</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this voter?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?voterFunction=true&deleteID='.$voter['ID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $vm = new VoterModal();

    $vm->displayVoterModal($dbc1);
    


?>