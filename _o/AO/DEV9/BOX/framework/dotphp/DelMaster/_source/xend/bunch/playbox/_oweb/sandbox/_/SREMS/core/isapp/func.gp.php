<?php
  function isGP($score, $credit,$return='GP'){
    #prep table
    if($score < 40) {$letter = 'F'; $point = 0;} // ie 0 - 39
    elseif($score < 45) {$letter = 'E'; $point = 1;} // ie 40 - 44
    elseif($score < 50) {$letter = 'D'; $point = 2;} // ie 45 - 49
    elseif($score < 60) {$letter = 'C'; $point = 3;} // ie 50 - 59
    elseif($score < 70) {$letter = 'B'; $point = 4;} // ie 60 - 69
    else{$letter = 'A'; $point = 5;} // ie 70 - 100

    if($return == 'GP'){$chore = ($point * $credit);}
    if($return == 'letter'){$chore = $letter;}
    if($return == 'point'){$chore = $point;}
    return $chore;
  }

  function GPA($totalGP, $totalCredit){
    return $totalGP/$totalCredit;
  }

  function CGPA($totalGPA){
    return $totalGPA/2;
  }

  function FCGPA($totalCGPA, $noOfYrs){
    return ($totalCGPA/$noOfYrs);
  }
?>