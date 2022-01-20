@include('app.pdf._utils.format')
@include('app.pdf._utils.taxes')

{{-- CONFIG 
-----------------------------------}}

@php
    $tax_per_item = $invoice->tax_per_item === "YES" ? true : false;
    $show_discount_column = ($invoice->discount_per_item === "YES") && ($invoice->discount_val > 0);
    $show_tax_column = $invoice->tax_per_item === "YES" ? true : false;

    $tax_by_percent=getTotalTaxesByPercent($invoice->items);
@endphp


{{-- RENDER 
-----------------------------------}}


@component('app.pdf.layout')
    @slot('title', $invoice->invoice_number)

    {{-- HEADER --}}
    @component('app.pdf._components.header')
        @slot("documentNumber", $invoice->invoice_number)
        @slot("documentDate", $invoice->formattedInvoiceDate)
        @slot("documentEcheance", $invoice->formattedDueDate)       
        @slot("clientTVA", $invoice->customer->getCustomFieldValueBySlug("CUSTOM_CUSTOMER_TVA"))
    @endcomponent

    {{-- ITEMS LOOP --}}
    @component('app.pdf._components.items.list')
        @slot("show_discount_column",$show_discount_column) 
        @slot("show_tax_column",$show_tax_column) 
        @php $i = 1; @endphp
        @foreach ($invoice->items as $item)
            @component('app.pdf._components.items.item')
                @slot("index", $i)
                @slot("name", $item->name)
                @slot("description", nl2br(htmlspecialchars($item->description)))
                @slot("quantity", $item->quantity)
                @slot("unit", format_unit($item->unit_name) )
                @slot("price", format_money_pdf($item->price, $invoice->customer->currency))
                @slot("show_discount_column",$show_discount_column)  
                @slot("discount", format_money_pdf($item->discount_val, $invoice->customer->currency))
                @slot("show_tax_column", $show_tax_column) 
                @slot("taxes_percent", getItemTaxesPercent($item))
                @slot("total", format_money_pdf($item->total, $invoice->customer->currency))
            @endcomponent
            @php $i++; @endphp
        @endforeach
    @endcomponent

    {{-- TOTAL --}}
    @component('app.pdf._components.items.total')
        @slot("subtotal", "")
        @slot("discount", $invoice->discount) {{-- Ajout percentage/fixed --}}
        @slot("discountValue", format_money_pdf($invoice->discount_val, $invoice->customer->currency))
        @slot("total_ht", format_money_pdf($invoice->sub_total, $invoice->customer->currency))
        {{-- TVA LOOP --}}
        @if($invoice->tax > 0)
            @if ($tax_per_item)
                @foreach ($tax_by_percent as $percent => $amount)
                    @component('app.pdf._components.items.tax')
                        @slot("name", "TVA (" . $percent. "%)")
                        @slot("value", format_money_pdf($amount, $invoice->customer->currency))
                    @endcomponent
                @endforeach
            @else
                @foreach ($invoice->taxes as $tax)
                    @component('app.pdf._components.items.tax')
                        @slot("name", $tax->name.' ('.$tax->percent.'%)')
                        @slot("value", format_money_pdf($tax->amount, $invoice->customer->currency))
                    @endcomponent
                @endforeach
            @endif
        @endif
        @slot("total_ttc", format_money_pdf($invoice->total, $invoice->customer->currency))
    @endcomponent
   
    {{-- TERMS --}}
    @component('app.pdf._components.terms')
        @if($invoice->notes)
            @slot("terms", $invoice->notes)
        @endif
        @slot("showSign", false)
        @slot("showPaymentTerms", true)
    @endcomponent
    
    {{-- FOOTER --}}
    @component('app.pdf._components.footer')
    @endcomponent

    {{-- HELPERS --}}
{{--     @component('app.pdf._components.helpers.marks')
    @endcomponent --}}
{{--     @component('app.pdf._components.helpers.print')
    @slot('data', $invoice)
    @endcomponent --}}
@endcomponent