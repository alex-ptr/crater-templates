@include('app.pdf._utils.discount')
@include('app.pdf._utils.format')
@include('app.pdf._utils.taxes')
@include('app.pdf._utils.total')
{{-- CONFIG 
-----------------------------------}}

@php
    $show_discount_column = hasItemDiscount($estimate->items) || hasGlobalDiscount($estimate);

    $tax_per_item = $estimate->tax_per_item === "YES" ? true : false;
    $show_tax_column = $estimate->tax_per_item === "YES" ? true : false;
    $tax_by_percent=getTotalTaxesByPercent($estimate->items);
@endphp


{{-- RENDER 
-----------------------------------}}


@component('app.pdf.layout')
    @slot('title', $estimate->estimate_number)

    {{-- HEADER --}}
    @component('app.pdf._components.header')
        @slot("type", "Devis")
        @slot("number", $estimate->estimate_number)
        @slot("date", $estimate->formattedEstimateDate)
        @slot("expiry", $estimate->formattedExpiryDate)       
        @slot("clientTVA", $estimate->customer->getCustomFieldValueBySlug("CUSTOM_CUSTOMER_TVA"))
    @endcomponent

    {{-- ITEMS LOOP --}}
    @component('app.pdf._components.items.list')
        @slot("show_discount_column",$show_discount_column) 
        @slot("show_tax_column",$show_tax_column) 
        @php $i = 1; @endphp
        @foreach ($estimate->items as $item)
            @component('app.pdf._components.items.item')
                @slot("index", $i)
                @slot("name", $item->name)
                @slot("description", nl2br(htmlspecialchars($item->description)))
                @slot("quantity", $item->quantity)
                @slot("unit", format_unit($item->unit_name) )
                @slot("price", format_money_pdf($item->price, $estimate->customer->currency))
                @slot("show_discount_column",$show_discount_column)  
                @slot("discount", getItemDiscount($item, $estimate->customer->currency))
                @slot("show_tax_column", $show_tax_column) 
                @slot("taxes_percent", getItemTaxesPercent($item))
                @slot("total", format_money_pdf($item->total, $estimate->customer->currency))
            @endcomponent
            @php $i++; @endphp
        @endforeach
    @endcomponent

    {{-- TOTAL --}}
    @component('app.pdf._components.items.total')
        @slot("subtotal", getSubTotalWithoutDiscount($estimate))
        @slot("discount", false) {{-- Ajout percentage/fixed --}}
        @slot("discountValue", getTotalDiscount($estimate))
        @slot("total_ht", format_money_pdf($estimate->sub_total, $estimate->customer->currency))
        {{-- TVA LOOP --}}
        @if($estimate->tax > 0)
            @if ($tax_per_item)
                @foreach ($tax_by_percent as $percent => $amount)
                    @component('app.pdf._components.items.tax')
                        @slot("name", "TVA (" . $percent. "%)")
                        @slot("value", format_money_pdf($amount, $estimate->customer->currency))
                    @endcomponent
                @endforeach
            @else
                @foreach ($estimate->taxes as $tax)
                    @component('app.pdf._components.items.tax')
                        @slot("name", $tax->name.' ('.$tax->percent.'%)')
                        @slot("value", format_money_pdf($tax->amount, $estimate->customer->currency))
                    @endcomponent
                @endforeach
            @endif
        @endif
        @slot("total_ttc", format_money_pdf($estimate->total, $estimate->customer->currency))
    @endcomponent
   
    {{-- TERMS --}}
    @component('app.pdf._components.terms')
        @slot("terms", $estimate->notes)
        @slot("showSign", true)
        @slot("showPaymentTerms", false)
    @endcomponent
    
    {{-- FOOTER --}}
    @component('app.pdf._components.footer')
    @endcomponent

    {{-- HELPERS --}}
{{--     @component('app.pdf._components.helpers.marks')
    @endcomponent --}}
{{--     @component('app.pdf._components.helpers.print')
    @slot('data', $estimate)
    @endcomponent --}}
@endcomponent