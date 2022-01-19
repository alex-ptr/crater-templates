@php

function format_unit($unit){
        if (empty($unit) || ($unit === "pièce")) {
        return null;
    }
    return " " . substr($unit, 0, 1);
}
@endphp