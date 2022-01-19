<div class="section">
    <table width="100%" class="table-cell-padding">
        <tr>
            <th width="2%" class="txt-center border-bottom">
                #
            </th>
            <th class="border-bottom">
                Article
            </th>
            <th width="10%" class="txt-right border-bottom">
                Qté
            </th>
            <th width="10%" class="txt-right border-bottom">
                Prix U
            </th>
            @if($hasDiscount)
                <th width="10%" class="txt-right border-bottom">
                    Remise
                </th>
            @endif
            <th width="10%" class="txt-right border-bottom">
                TVA
            </th>
            <th width="10%" class="txt-right border-bottom">
                Total
            </th>
        </tr>
        {{$slot}}
    </table>
</div>