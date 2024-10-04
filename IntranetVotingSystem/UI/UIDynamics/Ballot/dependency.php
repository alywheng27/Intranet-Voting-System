<?php
    class BallotDependency extends QueryRepo{
        function installBallotDependency($dbc1){
            $candidates = $this->getCandidate($dbc1, NULL, NULL);

            $positionHolder = NULL;
            foreach ($candidates as $candidate) {
                $position = $this->getPosition($dbc1, $candidate['PositionID']);
                $party = $this->getParty($dbc1, $candidate['PartyID']);

                if($position[0]['Name'] != $positionHolder){
                    $positionHolder = $position[0]['Name'];
                    
                    if($position[0]['Count'] > 1){
                        echo "
                            $('input.".$position[0]['ID']."').on('change', function(evt) {
                                if($(this).siblings(':checked').length >= ".$position[0]['Count'].") {
                                    this.checked = false;

                                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'center',
                                    showConfirmButton: false,
                                    timer: 3000
                                    });

                                    toastr.error('Only ".$position[0]['Count']." candidates can be selected for ".$position[0]['Name'].".');
                                }
                            });
                        ";
                    }
                }
            }
        }
    }

    $bd = new BallotDependency();

    $bd->installBallotDependency($dbc1);
?>