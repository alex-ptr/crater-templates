@php 
function hasItemDiscount($items){
    $discount = 0;
    foreach ($items as $item) {
        $discount += $item->discount;
    }
    return $discount > 0 ? true : false;
}

function getItemDiscount($item, $currency){
    if ($item->discount_type === "percentage")  {
        return $item->discount > 0 ? $item->discount . "%" : "-";
    } else {
        return $item->discount > 0 ? format_money_pdf($item->discount_val, $currency) : "-";
    }
}

function getTotalItemDiscount($items, $currency){
    $discount = 0;
    foreach ($items as $item) {
        $discount += $item->discount;
    }
    if ($discount > 0) {
        return format_money_pdf($discount, $currency);
    } else {
        return null;
    }
}

function hasGlobalDiscount($invoice){
    return ($invoice->discount_per_item === "YES") && ($invoice->discount_val > 0);
}



@endphp