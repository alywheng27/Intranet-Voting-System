<?php
    class PartyModal extends QueryRepo{
        function displayPartyModal($dbc1){
            $parties = $this->getParty($dbc1, NULL);

            foreach ($parties as $party) {
                echo '
                    <div class="modal fade" id="edit'.$party['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Party</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="partyQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?partyFunction=true&updateID='.$party['ID'].'" method="post">
                                    <div class="form-group">
                                        <label for="party'.$party['ID'].'">Party</label>
                                        <input type="text" name="party" id="party'.$party['ID'].'" class="form-control" value="'.$party['Name'].'" placeholder="Party" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile'.$party['ID'].'">Logo</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="partyImg" accept=".jpg, .jpeg, .png" class="custom-file-input" id="exampleInputFile'.$party['ID'].'">
                                            <label class="custom-file-label" for="exampleInputFile'.$party['ID'].'">Choose image</label>
                                        </div>
                                        </div>
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
      
                    <div class="modal fade" id="delete'.$party['ID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Party</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this party?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?partyFunction=true&deleteID='.$party['ID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $pm = new PartyModal();

    $pm->displayPartyModal($dbc1);
    


?>