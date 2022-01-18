
@php
    $document = $invoice;
    $doctype = "Facture";
    @endphp

@component('app.pdf._components.layout')
    @slot('title', $invoice->invoice_number)

    {{-- HEADER --}}
    @component('app.pdf._components.header')
        @slot("documentNumber")
            Mettre ici le num de doc
        @endslot 
        @slot("clientAddress")
            Mettre ici les coordonnees du client
        @endslot 
    @endcomponent

    {{-- ARTICLES --}}
    @component('app.pdf._components.items.list')
    @endcomponent

    @component('app.pdf._components.itmes.total')
    @endcomponent
    
    {{-- MENTIONS --}}
    @component('app.pdf._components.payment')
    @endcomponent
    
    @component('app.pdf._components.terms')
    @endcomponent

    {{-- FOOTER --}}
    @component('app.pdf._components.footer')
    @endcomponent
@endcomponent