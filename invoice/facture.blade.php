@component('app.pdf.layout')
    @slot('title', $invoice->invoice_number)

    {{-- HEADER --}}
    @component('app.pdf._components.header')
        @slot("documentNumber", $invoice->invoice_number)
        @slot("documentDate", $invoice->formattedInvoiceDate)
        @slot("documentEcheance", $invoice->formattedDueDate)       
        @slot("clientTVA", "FR404040404040404040") {{-- @TODO --}}
    @endcomponent

    {{-- ITEMS LOOP --}}
    @component('app.pdf._components.items.list')
        @slot("hasDiscount", $invoice->$invoice->discount_val)
        @php $i = 1; @endphp
        @foreach ($invoice->items as $item)
            @component('app.pdf._components.items.item')
                @slot("index", $i)
                @slot("name", $item->name)
                @slot("description", nl2br(htmlspecialchars($item->description)))
                @slot("quantity", $item->quantity)
                @slot("unit", format_unit($item->unit_name) )
                @slot("price", format_money_pdf($item->price, $invoice->customer->currency))  
                @if($item->discount_val)
                    @slot("discount", format_money_pdf($item->discount_val, $invoice->customer->currency))
                @endif
                @slot("tax_percent", "XX %") {{-- @TODO --}}
                @slot("total", format_money_pdf($item->total, $invoice->customer->currency))
            @endcomponent
            @php $i++; @endphp
        @endforeach
    @endcomponent

    {{-- TOTAL --}}
    @component('app.pdf._components.items.total')
        @if ($invoice->discount_val)
            @slot("subtotal", "")
            @slot("discount", $invoice->discount) {{-- Ajout percentage/fixed --}}
            @slot("discountValue", format_money_pdf($invoice->discount_val, $invoice->customer->currency))
        @endif
        @slot("total_ht", format_money_pdf($invoice->sub_total, $invoice->customer->currency))
        {{-- TVA LOOP --}}
        @foreach ($invoice->taxes as $tax)
            @component('app.pdf._components.items.tax')
                @slot("name", $tax->name.' ('.$tax->percent.'%)')
                @slot("value", format_money_pdf($tax->amount, $invoice->customer->currency))
            @endcomponent
        @endforeach
        @slot("total_ttc", format_money_pdf($invoice->total, $invoice->customer->currency))
    @endcomponent
   
    {{-- TERMS --}}
    @component('app.pdf._components.payment')
    @endcomponent
    
    @component('app.pdf._components.terms')
    @endcomponent

    {{-- FOOTER --}}
    @component('app.pdf._components.footer')
    @endcomponent

    {{-- HELPERS --}}
    @component('app.pdf._components.helpers.marks')
    @endcomponent
    @component('app.pdf._components.helpers.print')
    @endcomponent
@endcomponent