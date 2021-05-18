<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
        }

        .general_list {
            font-size: 9px;
            border-collapse: collapse;
        }

        .general_list tr td {
            line-height: 0.9;
            border: solid 1px black;
            padding: 2px 3px;
        }

        .general_list thead tr td {
            text-align: center;
        }

        .general_list tbody tr td {
            text-align: right;
        }

        .general_list tbody tr td:nth-child(2) {
            text-align: left;
        }

        .general_list tbody tr td:nth-child(6) {
            text-align: center;
        }

        .general_list thead tr td:nth-child(1) {
            width: 60px;
        }

        .general_list thead tr td:nth-child(2) {
            width: 275px;
        }

        .general_list thead tr td:nth-child(3) {
            width: 48px;
        }

        .general_list thead tr td:nth-child(4) {
            width: 70px;
        }

        .general_list thead tr td:nth-child(5) {
            width: 90px;
        }

        .general_list thead tr td:nth-child(6) {
            width: 10px;
            padding: 0;
        }

        .general_list tr td:last-child {
            width: 80px;
            border: 3px;
            border-style: solid solid none;
            text-align: center;
            background-color: rgb(200, 200, 200);

        }

        .general_list thead tr:nth-child(3) td:last-child {
            border: 3px solid;
            background-color: rgb(200, 200, 200);
        }

        .general_list tbody tr td {
            vertical-align: top;
        }

        .item_header td {
            height: 40px;
            font-size: 12px;
            line-height: 1;
            vertical-align: top;
            padding: 10px 5px 15px;
        }

        .items {
            padding: 0 5px !important;
            height: 20px;
        }

        .totals_text {
            font-size: 11px;
        }

        .general_list tfoot td {
            text-align: right;
        }

        .general_list tfoot td:first-child {
            text-align: left;
        }


        #single_td {
            vertical-align: bottom;
            padding-top: 5px;
            border-style: none solid solid;
            text-align: center;
        }

        .general_list tr.tdWithoutBorder td {
            border-style: none solid;
        }

        .general_list tfoot tr td {
            padding: 20px 5px;
        }

        .line {
            position: absolute;
            top: 25px;
            left: -10px;
            border-bottom: 1px solid;
            transform: rotate(-45deg);
            width: 175%;
        }

        #colon-title {
            position: absolute;
            font-size: 8px;
            bottom: -20px;
            left: 0;
        }

        .bold {
            font-weight: bold;
        }

        #stamp {
            position: absolute;
            bottom: 45px;
            left: 30px;
            font-size: 10px;
            text-align: center;
            height: 58px;
            width: 80px;
            border: 1px dotted;
            border-radius: 40px;
            padding-top: 22px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <td><b>A.T.A. CARNET</b></td>
        <td style="text-align: center"><b>GENERAL LIST</b><em>/LISTA GENERAL&#258;</em></td>
        <td style="text-align: right"><em>CARNET A.T.A</em></td>
    </tr>
</table>
<table class="general_list">
    <thead>
    <tr>
        <td rowspan="2">
            <b>Item No./</b><br> Nr. de ordine
        </td>
        <td rowspan="2">
            <b>Trade description of goods and marks and numbers, if any/</b><br>Denumirea comercial&#259; a marfurilor
            si
            dup&#259; caz a m&#259;ricilor &#351;i numerelor
        </td>
        <td rowspan="2">
            <b>Number of Pieces/</b> Numarul de buc&#259;&#539i
        </td>
        <td rowspan="2">
            <b>Weight or Volume/</b> Greutate sau volum
        </td>
        <td rowspan="2">
            Value*/<br>Valoarea*
        </td>
        <td rowspan="2" style="position:relative;">
            <div style="transform: rotate(-90deg); position:absolute; left: 0; top: 23px; width: 50px;">
                **Country of origin! <br> **&#539;ara de origine
            </div>
        </td>
        <td rowspan="1" style="vertical-align: top; border-style: solid solid none;">
            <b>For Customs Use/ Rezervat vamii</b>
        </td>
    </tr>
    <tr>
        <td id="single_td">
            Indentification marks/m&#259;rci de identificare
        </td>
    </tr>
    <tr>
        @for($i = 1; $i<=7; $i++)
            <td class="bold">
                {{$i}}
            </td>
        @endfor
    </tr>
    </thead>
    <tbody id="content">
    <tr class="tdWithoutBorder item_header">
        <td></td>
        <td>{{$header['description']}}</td>
        <td></td>
        <td>{{$header['unit']}}</td>
        <td>{{$header['value']}}</td>
        <td></td>
        <td></td>
    </tr>
    {{--    Items Render        --}}
    @foreach($items as $item)
        <tr class="tdWithoutBorder">
            <td style="padding: 0 6px;">{{($item['id'] + 1).'.'}}</td>
            @foreach($item as $column => $property)
                @if($column != 'id')
                    <td class="items">
                        {{$property}}
                    </td>
                @endif
            @endforeach
            <td></td>
        </tr>
    @endforeach
    <tr class="tdWithoutBorder">
        <td>=======</td>
        <td>===================================</td>
        <td>=====</td>
        <td>=======</td>
        <td>===========</td>
        <td>=====</td>
        <td></td>
    </tr>
    <tr class="tdWithoutBorder">
        <td></td>
        <td class="totals_text">{{$totalsText}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
    {{--          Table Extending              --}}
    @for($row = 0; $row < $toExtend; $row++ )
        <tr class="tdWithoutBorder">
            @for($i = 1; $i <= 7; $i++)
                <td class="items">&nbsp;</td>
            @endfor
        </tr>
    @endfor
    {{--         Totals            --}}
    <tfoot>
    <tr>
        <td colspan="2">
            <b>TOTAL or CARRIED OVER</b>/ TOTAL sau transferat
        </td>
        <td>
            <b>
                {{ $totals['pieces'] }}
            </b>
        </td>
        <td>
            <b>
                {{ $totals['weight'] }}
            </b>
        </td>
        <td>
            <b>
                {{ $totals['value'] }}
            </b>
        </td>
        <td style="position: relative;">
            <div class="line"></div>
        </td>
        <td style="border-style: none solid solid"></td>
    </tr>
    </tfoot>
</table>

<div id="stamp">
    <b>Stamp</b>/<br>
    &#350;tampil&#259;
</div>
<div id="colon-title">
    <b>*Commercial value in country / customs territory of issue and in its currency, unless stated differently/*</b>
    Valoarea comercial&#259; &#206;n &#539;ara / teritoriul vamal de emitere a carnetului &#351;i &#206;n moneda sa na&#539;ional&#229;
    numai dac&#229; nu se specific&#229; altfel
    <br>
    <b>**Show country of origin if different from country / customs territory of issue of the Carnet, using ISO country
        codes /**</b>
    Se indic&#259; &#539;ara de origine dac&#259; este alta dec&#226;t &#539;ara / teritoriul vamal de emitere
    a carnetului, utiliz&#226;nd codul interna&#539;ional ISO al &#539;&#259;rilor
</div>
</body>
</html>
