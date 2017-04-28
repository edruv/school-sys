<?php



   function semestre()
   {
      $mes = date('n');
      ($mes <= 6) ? $cal = date('y').'A' : $cal = date('y').'B' ;
      return $cal;
   }

   echo semestre();
?>
