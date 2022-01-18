<style text="text/css">

    /* TEMP ----------------------- */

</style>

@php 

function hasVAT($item) {
    if ( ($document->tax_per_item === 'YES') && ($item->taxes[0]->percent > 0) ) {
        return true;
    }
    return false;
}

function getVATPercent($item) {
    if ( ($document->tax_per_item === 'YES') && ($item->taxes[0]->percent > 0) ) {
        return $item->taxes[0]->percent . " %"; 
    }
    return "-";
}

@endphp

<tr>

    {{$index}}
    {{$item}}
    <th>{{$index}}</th>
    <td>{{$description}}</td>
    <td>{{$item->quantity}} {!! formatUnit($unit) !!}</td>
    <td>{!! formatNumber($item->price) !!}</td>
    <td>{!! getVATPercent($item) !!}</td>
    <td>{!! formatNumber($item->total) !!}</td>
</tr>