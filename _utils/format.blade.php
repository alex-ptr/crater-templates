@php

function format_unit($unit){
        if (empty($unit) || ($unit === "pc")) {
        return null;
    }
    return $unit;
}
@endphp