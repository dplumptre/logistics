<?php

                      


    function getTotal(iterable $iterable,$state) {
        $tt_good=0;
        $tt_bad=0;
        $tt_damaged=0;
        foreach ($iterable as $value) {
            $tt_good += $value->pivot->quantity_good;
            $tt_bad += $value->pivot->quantity_bad;
            $tt_damaged += $value->pivot->quantity_damaged;
        } 

        switch ($state){
            case "good":
            return $tt_good;
            break;
            case "bad":
            return $tt_bad;
            break;
            default:
            return $tt_damaged;
            break;
        }
    }
                                