<?php
    class CandidateModal extends QueryRepo{
        function displayCandidateModal($dbc1){
            $candidates = $this->getCandidate($dbc1, NULL, NULL);

            foreach ($candidates as $candidate) {
                echo '
                    <div class="modal fade" id="edit'.$candidate['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Candidate</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="candidateQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?candidateFunction=true&updateID='.$candidate['ID'].'" method="post">
                                    <div class="form-group">
                                        <label for="candidate'.$candidate['ID'].'">Candidate</label>
                                        <input type="text" name="candidate" value="'.$candidate['Name'].'" id="candidate'.$candidate['ID'].'" class="form-control" placeholder="Candidate" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile'.$candidate['ID'].'">Photo</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="candidateImg" accept=".jpg, .jpeg, .png" class="custom-file-input" id="exampleInputFile'.$candidate['ID'].'">
                                            <label class="custom-file-label" for="exampleInputFile'.$candidate['ID'].'">Choose image</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="position'.$candidate['ID'].'">Position</label>
                                        <select name="position" class="form-control select2Position'.$candidate['ID'].' select2-success" id="position'.$candidate['ID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $positions = $this->getPosition($dbc1, NULL);                
                                            foreach ($positions as $position) {
                                                if($candidate['PositionID'] == $position['ID']) {
                                                    echo '<option value="'.$position['ID'].'" selected>'.$position['Name'].'</option>';
                                                }else {
                                                    echo '<option value="'.$position['ID'].'">'.$position['Name'].'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="party'.$candidate['ID'].'">Party</label>
                                        <select name="party" class="form-control select2Party'.$candidate['ID'].' select2-success" id="party'.$candidate['ID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $parties = $this->getParty($dbc1, NULL);                
                                            foreach ($parties as $party) {
                                                if($candidate['PartyID'] == $party['ID']) {
                                                    echo '<option value="'.$party['ID'].'" selected>'.$party['Name'].'</option>';
                                                }else {
                                                    echo '<option value="'.$party['ID'].'">'.$party['Name'].'</option>';
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
      
                    <div class="modal fade" id="delete'.$candidate['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Candidate</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this candidate?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?candidateFunction=true&deleteID='.$candidate['ID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $cm = new CandidateModal();

    $cm->displayCandidateModal($dbc1);
    


?>