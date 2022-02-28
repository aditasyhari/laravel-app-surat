<?php

function getBulanRomawi($bln){
    switch ($bln){
        case "01": 
            return "I";
            break;
        case "02":
            return "II";
            break;
        case "03":
            return "III";
            break;
        case "04":
            return "IV";
            break;
        case "05":
            return "V";
            break;
        case "06":
            return "VI";
            break;
        case "07":
            return "VII";
            break;
        case "08":
            return "VIII";
            break;
        case "09":
            return "IX";
            break;
        case "10":
            return "X";
            break;
        case "11":
            return "XI";
            break;
        case "12":
            return "XII";
            break;
    }
}

?>