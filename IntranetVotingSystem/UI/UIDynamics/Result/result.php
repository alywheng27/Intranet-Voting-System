<?php
    class Result extends QueryRepo{
        function displayResult($dbc1){
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
                        $count = 0;
                        $limit = $position[0]['Count'];
                        $positionHolder = $position[0]['Name'];
                        $endDiv = TRUE;
                        echo '<h4 class="mb-2">'.$positionHolder.'</h4>';
                        echo '<div class="mb-3" style="display: flex; flex-direction: column; column-gap: 15px;">';
                    }

                    if($count < $limit){
                        echo '<div class="callout callout-success background-img text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\''.$party[0]['LogoURL'].'\');">';
                    }else {
                        echo '<div class="ml-5 callout callout-warning background-img text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\''.$party[0]['LogoURL'].'\');">';
                    }

                    $count++;

                    echo '
                        
                            <div style="display: flex;">';
                            echo '<img src="'.$candidate['PhotoURL'].'" class="rounded-circle" style="width: 4rem;" alt="">';
                            echo '<div class="ml-3" style="display: flex; flex-direction: column; justify-content: center;">
                                <h5 class="mb-0 "><strong>'.$candidate['Name'].'</strong></h5>
                                <p class="">'.$positionHolder.'</p>
                            </div>
                            <div class="ml-auto pt-2 pr-3" style="display: flex; flex-direction: column; justify-content: center;">
                                <h3>'.$candidate['Vote'].'</h3>
                            </div>
                            
                            </div>
                        </div>
                    ';
                }
                echo '</div>';

            }
        }
    }

    $r = new Result();

    $r->displayResult($dbc1);
    


?>