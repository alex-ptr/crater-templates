<div class="section">
    <table class="align-right table-cell-padding" width="30%">
        {{-- Remise --}} 
        <tr>
            <th class="font-regular border-top">
                Sous-total HT
            </th>
            <td class="txt-right border-top">
                {!!$subtotal!!}
            </td>
        </tr>
        {{-- Total HT --}}
        <tr>
            <th class="font-regular">
                Remise {!!$discount!!}
            </th>
            <td class="txt-right">
                {!!$discountValue!!}
            </td>
        </tr>
        <tr>
            <th class="border-top">
                Total HT
            </th>
            <td class="txt-right border-top txt-bold">
                {!!$total_ht!!}
            </td>
        </tr>
        {{-- TVA --}}
        {{$slot}}
        {{-- Total TTC --}}
        <tr>
            <th class="border-top border-bottom border-left">
                Total TTC
            </th>
            <td class="txt-right border-top border-bottom border-right txt-bold">
                {!!$total_ttc!!}
            </td>
        </tr>
    </table>
</div>