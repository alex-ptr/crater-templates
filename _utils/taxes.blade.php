@php 
function getItemTaxesPercent($item) {
    $taxes = [];
    foreach ($item->taxes as $tax) {
        $taxes[] = $tax->percent . '%';
    }
    return $taxes;
}

function getTotalTaxesByPercent($items){
    $TVA = [];

    foreach ($items as $item) {
        foreach ($item->taxes as $tax) {
            // Verify if the tax is already in the array
            if (!array_key_exists($tax->percent, $TVA)){
                $TVA[$tax->percent] = 0;
            }
            // Add TVA to array
            $TVA[$tax->percent] += $tax->amount ;
        }
    }

    return $TVA;
}

@endphp