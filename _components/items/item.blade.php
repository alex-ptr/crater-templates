<tr>
    <th class="align-top txt-center">{!!$index!!}</th>
    <td class="align-top">
        <p>{!!$name!!}</p>
        <p class="font-small">{!!$description!!}</p>
    </td>
    <td class="align-top txt-right">{{$quantity}}{!! $unit !!}</td>
    <td class="align-top txt-right">{!!$price!!}</td>
    @if($discount)
        <td class="align-top txt-right">{!!$discount!!}</td>
    @endif
    <td class="align-top txt-right">{!!$discount!!}</td>
    <td class="align-top txt-right">{!!$tax_percent!!}</td>
    <td class="align-top txt-right">{!!$total!!}</td>
</tr>
