<?php
    class Elected extends QueryRepo{
        function displayElected($dbc1){
            $candidates = $this->getCandidate($dbc1, NULL, NULL);

            $positionHolder = NULL;
            $endDiv = FALSE;
            if($candidates != NULL){
                foreach ($candidates as $candidate) {
                    $position = $this->getPosition($dbc1, $candidate['PositionID']);
                    $party = $this->getParty($dbc1, $candidate['PartyID']);

                    if($position[0]['Name'] != $positionHolder){
                        $winners = $this->getCandidate($dbc1, $position[0]['ID'], $position[0]['Count']);
                    }

                    foreach ($winners as $winner) {
                        if($winner['ID'] == $candidate['ID']){
                            if($endDiv AND $position[0]['Name'] != $positionHolder){
                                echo '</div>';
                            }
                            
                            if($position[0]['Name'] != $positionHolder){
                                $positionHolder = $position[0]['Name'];
                                $endDiv = TRUE;
                                //echo '<h2 class="mb-2">'.$positionHolder.'</h2>';
                                echo '<div class="" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); column-gap: 15px;">';
                            }

                            echo '
                                <div class="callout callout-success background-img text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\''.$party[0]['LogoURL'].'\');">
                                    <div style="display: flex;">';
                                    //<img src="'.$candidate['PhotoURL'].'" class="rounded-circle" style="width: 4rem;" alt="">
                                    echo '<div class="ml-3" style="display: flex; flex-direction: column; justify-content: center;">
                                        <h5 class="mb-0 "><strong>'.$candidate['Name'].'</strong></h5>
                                        <p class="">'.$positionHolder.'</p>
                                    </div>
                                    <div class="ml-auto pt-2 pr-3" style="display: flex; flex-direction: column; justify-content: center;">
                                        <h3>'.$winner['Vote'].'</h3>
                                    </div>
                                    
                                    </div>
                                </div>
                            ';
                        }
                    }
                    

                    
                }
                echo '</div>';

            }
        }
    }

    $v = new Elected();

    $v->displayElected($dbc1);
    


?>