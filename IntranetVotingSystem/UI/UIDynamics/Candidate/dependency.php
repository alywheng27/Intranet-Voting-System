<?php
    class CandidateDependency extends QueryRepo{
        function installCandidateDependency($dbc1){
            $candidates = $this->getCandidate($dbc1, NULL, NULL);

            foreach ($candidates as $candidate) {
                echo '
                    $(".select2Position'.$candidate['ID'].'").select2();
                    $(".select2Party'.$candidate['ID'].'").select2();
                ';
            }
        }
    }

    $cd = new CandidateDependency();

    $cd->installCandidateDependency($dbc1);
?>