<?php
    class PositionDependency extends QueryRepo{
        function installPositionDependency($dbc1){
            $positions = $this->getPosition($dbc1, NULL);

            foreach ($positions as $position) {
                echo '
                    $(".select2Order'.$position['ID'].'").select2();
                    $(".select2Count'.$position['ID'].'").select2();
                ';
            }
            
        }
    }

    $pd = new PositionDependency();

    $pd->installPositionDependency($dbc1);
    


?>