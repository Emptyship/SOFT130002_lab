<?php

    function outputOrderRow($file, $title, $quantity, $price) {
        $root="images/books/tinysquare/";
        echo "<tr>";
        //TODO
        echo"<td>"."<img src=".$root.$file."></td>";
        echo"<td class=\"mdl-data-table__cell--non-numeric\">".$title."</td>";
        echo"<td>".$quantity."</td>";
        echo"<td>"."$".$price.".00"."</td>";
        echo"<td>"."$".$price*$quantity.".00"."</td>";
        echo "</tr>";
    }
   function amountcl($quantity, $price) {
        $amount=$price*$quantity;
        return $amount;
   }


?>