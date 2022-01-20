<style type="text/css">
    #sign{
        width:8cm; 
        height:4cm; 
        padding:.2cm;
        margin-left:3.5cm;
        color:#999;
        border:1px solid rgb(240, 240, 240);
        border-radius: .1cm;
    }
    #payment th,
    #payment td{
        padding-top:.5cm;
    }
</style>

<div class="section-small font-small">
    @if($terms)
        <div class="margin-bottom" style="text-align:justify !important">{!! $terms !!}</div>
    @endif

    @if($showSign)
        <div class="margin-bottom" id="sign">
            <p class="font-small txt-uppercase">Bon pour accord</p>
            <p class="font-small txt-uppercase">Cachet, date et signature</p>
        </div>
    @endif
        
    @if($showPaymentTerms)
        <table class="font-small" id="payment">
            <tr>
                <th width="3.5cm" class="align-top font-regular">Moyens de paiement</th>
                <td>
                    <div class="margin-bottom">
                        <p class="txt-underline">Par virement</p>
                        <p>IBAN : <span class="font-bold">FR76 1695 8000 0127 0286 3485 595</span></p>
                        <p>BIC : <span class="font-bold">QNTOFRP1XXX</span></p>
                    </div>
                    <div>
                        <p class="txt-underline">Par chèque</p>
                        <p>Membre d'une AGA, accepte les règlements à l'ordre d'<span class="font-bold">Alexandre Peter</span></p>
                    </div>
                </td>
            </tr>
            <tr>
                <th rowspan="2" class="align-top font-regular">Conditions</th>
                <td>
                    <p>Sous 30 jours</p>
                </td>
            </tr>
            <tr>
                <td>En vous remerciant d'avance</td>
            </tr>
        </table>
    @endif
</div>