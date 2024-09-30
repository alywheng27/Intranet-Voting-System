<?php
    class PositionModal extends QueryRepo{
        function displayPosition($dbc1){
            $positions = $this->getPosition($dbc1, NULL);

            foreach ($positions as $position) {
                echo '
                    <div class="modal fade" id="edit'.$position['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Position</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?positionFunction=true&updateID='.$position['ID'].'" method="post">
                                <div class="form-group">
                                    <label for="position'.$position['ID'].'">Position</label>
                                    <input type="text" name="position" id="position'.$position['ID'].'" class="form-control" placeholder="Position" value="'.$position['Name'].'" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="order'.$position['ID'].'">Order of Position</label>
                                    <select name="order" class="form-control select2Order'.$position['ID'].' select2-success" id="order'.$position['ID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                        for ($i=1; $i <= 20; $i++) { 
                                            if($position['Decree'] == $i){
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        }
                                    echo '</select>
                                </div>
                                <div class="form-group">
                                    <label for="count'.$position['ID'].'">Count of Winner/s</label>
                                    <select name="count" class="form-control select2Count'.$position['ID'].' select2-success" id="count'.$position['ID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                        for ($i=1; $i <= 20; $i++) { 
                                            if($position['Count'] == $i){
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        }
                                    echo '</select>
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
      
                    <div class="modal fade" id="delete'.$position['ID'].'">
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
                            <a href="?positionFunction=true&deleteID='.$position['ID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $pm = new PositionModal();

    $pm->displayPosition($dbc1);
    


?>