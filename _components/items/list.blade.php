<div class="section">
    <table width="100%" class="table-cell-padding background-row-odd border-bottom">
        <tr class="background">
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
            @if($show_discount_column)
                <th width="10%" class="txt-right border-bottom">
                    Remise
                </th>
            @endif
            @if($show_tax_column)
                <th width="10%" class="txt-right border-bottom">
                    TVA
                </th>
            @endif
            <th width="10%" class="txt-right border-bottom">
                Total
            </th>
        </tr>
        {{$slot}}
    </table>
</div>