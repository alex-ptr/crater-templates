<div class="section">
    <table class="align-right table-cell-padding" width="30%">
        @if ($discount)
            {{-- SUBTOTAL --}} 
            <tr>
                <th class="font-regular border-top">
                    Sous-total HT
                </th>
                <td class="txt-right border-top">
                    {!!$subtotal!!}
                </td>
            </tr>
            {{-- DISCOUNT --}}
            <tr>
                <th class="font-regular">
                    Remise {!!$discount!!}
                </th>
                <td class="txt-right">
                    {!!$discountValue!!}
                </td>
            </tr>
        @endif
        {{-- TOTAL HT --}}
        <tr class="background">
            <th>
                Total HT
            </th>
            <td class="txt-right font-bold">
                {!!$total_ht!!}
            </td>
        </tr>
        {{-- TVA --}}
        {{$slot}}
        {{-- Total TTC --}}
        <tr class="background">
            <th class="border-top border-bottom border-left">
                Total TTC
            </th>
            <td class="txt-right border-top border-bottom border-right font-bold">
                {!!$total_ttc!!}
            </td>
        </tr>
    </table>
</div>