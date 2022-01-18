@php

function formatNumber($number){
    return format_money_pdf($number, $document->customer->currency) ;
}

function formatUnit($unit){
        if (empty($unit) || ($unit === "pièce")) {
        return null;
    }
    return " " . substr($unit, 0, 1);
}
@endphp