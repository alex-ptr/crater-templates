@php

function getSubTotalWithoutDiscount($invoice){
    $subTotal = 0;
    foreach ($invoice->items as $item) {
        $subTotal += $item->price * $item->quantity;
    }
    return format_money_pdf($subTotal, $invoice->customer->currency);
}

function getTotalDiscount($invoice){
    $discount_val = 0;

    if($invoice->discount_val >0){
        return format_money_pdf($discount_val, $invoice->customer->currency);
    } else {
        foreach ($invoice->items as $item) {
            $discount_val += $item->discount_val;
        }
        return format_money_pdf($discount_val, $invoice->customer->currency);
    }
}

@endphp