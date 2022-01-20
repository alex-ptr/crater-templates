<tr>
    <th class="align-top txt-center">{!!$index!!}</th>
    <td class="align-top">
        <p>{!!$name!!}</p>
        <p class="font-small">{!!$description!!}</p>
    </td>
    <td class="align-top txt-right">{{$quantity}}{!! $unit !!}</td>
    <td class="align-top txt-right">{!!$price!!}</td>
    @if($show_discount_column)
        <td class="align-top txt-right">{!!$discount!!}</td>
    @endif
    @if($show_tax_column)
        <td class="align-top txt-right">
            @php $i = 0 @endphp
            @foreach($taxes_percent as $tax_precent)
                @if($i > 0)
                    <br>
                @endif
                {{$tax_precent}}
                @php $i++ @endphp
            @endforeach
        </td>
    @endif
    <td class="align-top txt-right">{!!$total!!}</td>
</tr>
