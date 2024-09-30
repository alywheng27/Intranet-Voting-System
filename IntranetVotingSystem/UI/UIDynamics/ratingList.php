<?php
    class RatingList extends QueryRepo{
      function displayRatingList($dbc1, $sort){
        for ($i=5; $i >= 1; $i--) { 
          $ratingList1 = $this->getRatingListCount($dbc1, 'JobKnowledge', $i, $sort);
          $ratingList2 = $this->getRatingListCount($dbc1, 'WorkQuality', $i, $sort);
          $ratingList3 = $this->getRatingListCount($dbc1, 'AvailabilityOfPersonnel', $i, $sort);
          $ratingList4 = $this->getRatingListCount($dbc1, 'AttitudeAndCooperation', $i, $sort);
          $ratingList5 = $this->getRatingListCount($dbc1, 'DependabilityAndEfficiency', $i, $sort);

          echo $ratingList1[0]['RatingListCount'].',';
          echo $ratingList2[0]['RatingListCount'].',';
          echo $ratingList3[0]['RatingListCount'].',';
          echo $ratingList4[0]['RatingListCount'].',';
          echo $ratingList5[0]['RatingListCount'].',';
        }
      }
    }

    $rl = new RatingList();

    if(isset($_SESSION['sort'])){
      $sort = $_SESSION['sort'];
    }else{
      $sort = 'all';
    }

    $rl->displayRatingList($dbc1, $sort);
?>