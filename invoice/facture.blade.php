
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
    @component('app.pdf._components.articles')
    @endcomponent

    @component('app.pdf._components.totaux')
    @endcomponent
    
    {{-- MENTIONS --}}
    @component('app.pdf._components.paiement')
    @endcomponent
    
    @component('app.pdf._components.notes')
    @endcomponent

    {{-- FOOTER --}}
    @component('app.pdf._components.footer')
        @slot('page')
            1
        @endslot
        @slot('nb_pages')
            2
        @endslot
    @endcomponent
@endcomponent