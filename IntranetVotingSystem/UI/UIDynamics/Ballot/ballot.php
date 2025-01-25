<?php
    class Ballot extends QueryRepo{
        function displayBallot($dbc1){
            $candidates = $this->getCandidate($dbc1, NULL, NULL);

            $positionHolder = NULL;
            $endDiv = FALSE;
            if($candidates != NULL){
                foreach ($candidates as $candidate) {
                    $position = $this->getPosition($dbc1, $candidate['PositionID']);
                    $party = $this->getParty($dbc1, $candidate['PartyID']);

                    if($endDiv AND $position[0]['Name'] != $positionHolder){
                        echo '</div>';
                    }
                    
                    if($position[0]['Name'] != $positionHolder){
                        $positionHolder = $position[0]['Name'];
                        $endDiv = TRUE;
                        if($positionHolder == 'Sergeant at Arms'){
                            echo '<h1 class="text-center mb-3">'.$positionHolder.'</h1> <p><strong>Up to 2 Votes</strong></p>';
                        }else if($positionHolder == 'Board Of Directors') {
                            echo '<h1 class="text-center mb-3">'.$positionHolder.'</h1> <p><strong>Up to 8 Votes</strong></p>';
                        }else {
                            echo '<h1 class="text-center mb-3">'.$positionHolder.'</h1>';
                        }
                        echo '<div class="mb-5" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); column-gap: 15px;">';
                    }

                    if($position[0]['Count'] > 1){
                        echo '<input type="checkbox" class="'.$position[0]['ID'].'" name="'.$position[0]['ID'].'[]" value="'.$candidate['ID'].'" id="'.$candidate['ID'].'">';
                    }else {
                        echo '<input type="radio" class="'.$position[0]['ID'].'" name="'.$position[0]['ID'].'" value="'.$candidate['ID'].'" id="'.$candidate['ID'].'">';
                    }
                    
                    echo '
                        <label for="'.$candidate['ID'].'" class="callout callout-success background-img candidate-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\''.$party[0]['LogoURL'].'\');">
                            <div style="display: flex;">
                            <img src="'.$candidate['PhotoURL'].'" class="rounded-circle" style="width: 4rem;" alt="">
                            <div class="ml-3" style="display: flex; flex-direction: column; justify-content: center;">
                                <h5 class="mb-0 "><strong>'.$candidate['Name'].'</strong></h5>
                                <p class="">For '.$positionHolder.'</p>
                            </div>
                            </div>
                        </label>
                    ';
                }
                echo '</div>';
            }
            
            
            
        }
    }

    $v = new Ballot();

    $v->displayBallot($dbc1);
    


?>