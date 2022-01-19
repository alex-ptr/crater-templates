<style text="text/css">
    header{
        min-height: 9.4cm;
    }
    #logo {
        margin:0 0 .5cm;
        height:3cm;
    }
    #logo img{
        height:3cm; 
    }
</style>

<header class="section">
    <table width="100%">
        <tr>
            <td class="align-top" width="50%" rowspan="3">
                @if($logo)
                    <div id="logo">
                        <img src="{{ $logo }}" alt="Logo"  />
                    </div>
                @endif
                {!! $company_address !!}
            </td>
            <td class="align-top txt-right" height="3.5cm">
                <table class="align-right table-cell-padding">
                    <tr>
                        <td colspan="2" class="border-bottom">
                            <h1 class="txt-right">Facture</h1>
                        </td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <td class="txt-right">{{$documentNumber}}</td>
                    </tr>
                    <tr>
                        <th>@lang('pdf_invoice_date')</th>
                        <td class="txt-right">{{$documentDate}}</td>
                    </tr>
                    <tr>
                        <th>@lang('pdf_invoice_due_date')</th>
                        <td class="txt-right">{{$documentEcheance}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="4.5cm" style="padding-right:2.5cm">
                {!! $billing_address !!}
            </td>
        </tr>
        @if($clientTVA)
        <tr>
            <td height="1cm">
                TVA : {!!$clientTVA!!}
            </td>
        </tr>
        @endif
    </table>
</header>