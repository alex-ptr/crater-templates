@php

function format_unit($unit){
    if (empty($unit) || ($unit === "pc")) {
        return null;
    }
    return substr($unit, 0, 1);
}
@endphp