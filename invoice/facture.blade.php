@component('app.pdf._components.layout')
    @slot('title', $invoice->invoice_number)

    {{-- HEADER --}}
    @component('app.pdf._components.header')
        @slot("documentNumber", $invoice->invoice_number)
        @slot("documentDate", $invoice->formattedInvoiceDate)
        @slot("documentEcheance", $invoice->formattedDueDate)       
        @slot("clientTVA", "FR404040404040404040")
    @endcomponent

    {{-- ARTICLES --}}
    @component('app.pdf._components.items.list')
        @php
            $index = 1;
        @endphp
        @foreach ($invoice->items as $item)
            @component('app.pdf._components.items.item')
                @slot("index", $index)
                @slot("name", $item->name)
                @slot("description", nl2br(htmlspecialchars($item->description)))
                @slot("quantity", $item->quantity)
                @slot("unit", $item->unit_name)
                @slot("price", format_money_pdf($item->price, $invoice->customer->currency))  
                @slot("discount", format_money_pdf($item->discount_val, $invoice->customer->currency))
                @slot("tax_percent", "XX %")
                @slot("total", format_money_pdf($item->total, $invoice->customer->currency))
            @endcomponent
            @php
                $index += 1;
            @endphp
        @endforeach
    @endcomponent

    {{-- TOTAL --}}
    @component('app.pdf._components.items.total')
        @slot("subtotal", "")
        @slot("discount", $invoice->discount) {{-- Ajout percentage/fixed --}}
        @slot("discountValue", format_money_pdf($invoice->discount_val, $invoice->customer->currency))
        @slot("total_ht", format_money_pdf($invoice->sub_total, $invoice->customer->currency))
        {{-- TVA --}}
        @foreach ($invoice->taxes as $tax)
            @component('app.pdf._components.items.tax')
                @slot("name", $tax->name.' ('.$tax->percent.'%)')
                @slot("value", format_money_pdf($tax->amount, $invoice->customer->currency))
            @endcomponent
        @endforeach
        @slot("total_ttc", format_money_pdf($invoice->total, $invoice->customer->currency))
    @endcomponent
   
    {{-- MENTIONS --}}
    @component('app.pdf._components.payment')
    @endcomponent
    
    @component('app.pdf._components.terms')
    @endcomponent

    {{-- FOOTER --}}
    @component('app.pdf._components.footer')
    @endcomponent

    @component('app.pdf._components.marks')
    @endcomponent
@endcomponent