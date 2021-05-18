<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 8px;
            line-height: 0.9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .continuation {
            font-size: 9px;
            border-collapse: collapse;
        }

        .continuation tr td {
            line-height: 0.9;
            border: solid 1px black;
            padding: 2px 3px;
        }

        .continuation thead tr td {
            text-align: center;
        }

        .continuation tbody tr td {
            text-align: right;
        }

        .continuation tbody tr td:nth-child(2) {
            text-align: left;
        }

        .continuation tbody tr td:nth-child(6) {
            text-align: center;
        }

        .continuation thead tr td:nth-child(1) {
            width: 50px;
        }

        .continuation thead tr td:nth-child(2) {
            width: 275px;
        }

        .continuation thead tr td:nth-child(3) {
            width: 48px;
        }

        .continuation thead tr td:nth-child(4) {
            width: 70px;
        }

        .continuation thead tr td:nth-child(5) {
            width: 90px;
        }

        .continuation thead tr td:nth-child(6) {
            width: 10px;
            padding: 0;
        }

        .continuation tr td:last-child {
            width: 80px;
            border: 3px;
            border-style: solid solid none;
            text-align: center;
            background-color: rgb(200, 200, 200);

        }

        .continuation thead tr:nth-child(3) td:last-child {
            border: 3px solid;
            background-color: rgb(200, 200, 200);
        }

        .continuation tbody tr:first-child td {
            padding-top: 5px !important;
        }

        .continuation tbody tr td {
            vertical-align: top;
        }

        .item_header td {
            height: 20px;
            font-size: 9px;
            line-height: 1;
            vertical-align: top;
        }

        .items {
            padding: 0 5px !important;
            height: 20px;
        }

        .continuation tfoot td {
            text-align: right;
        }

        .continuation tfoot td:first-child {
            text-align: left;
        }


        #single_td {
            vertical-align: bottom;
            padding-top: 5px;
            border-style: none solid solid;
            text-align: center;
        }

        .continuation tr.tdWithoutBorder td {
            border-style: none solid;
        }

        .continuation tfoot tr td {
            padding: 10px 5px;
        }

        .line {
            position: absolute;
            top: 15px;
            left: -3px;
            border-bottom: 1px solid;
            transform: rotate(-30deg);
            width: 140%;
        }

        #date {
            position: absolute;
            top: 16px;
            right: -6px;
            height: 25px;
            border: 1px solid;
            width: 200px;
        }
        #date div {
            position: relative;
            top: 5px;
            left: 5px;
            font-size: 16px;
            text-align: center;
            letter-spacing: 7px;
            color: lightskyblue;
        }

        #signature_table {
            margin-bottom: 10px;
        }

        #signature_table tr td {
            vertical-align: bottom;
            width: 30%;
        }

        #signature_table tr td:nth-child(2) {
            padding-left: 100px;
        }

        #signature_table tr td:nth-child(2) div {
            height: 50px;
            width: 60px;
            border: 1px solid;
            border-radius: 25px;
        }

        #signature_table tr td:first-child,
        #signature_table tr td:last-child {
            width: 25%;
        }

        #signature_table tr td:first-child div,
        #signature_table tr td:last-child div {
            border-bottom: 2px dotted;
        }
    </style>
</head>
<body>
@if(!$pagesCount)
    <h1>Va fi realizat functionalul pentru a limita accesul pentru cazul cand nu este necesara continuarea listei generale, daca doriti sa vizualizati un exemplu a continuarii listei generale accesati carnetul cu id 1,2,3 </h1>
@endif
@foreach($pages as $pageCount => $page)
    <div style="position:relative;">
        <div style="font-size: 9px; padding: 0 0 15px 5px;">
            <b style="font-size: 15px"> A.T.A CARNET</b>CONTINUATION SHEET GENERAL LIST No. ..........<span style="font-size: 11px; font-weight:bold;">{{$pageCount + 1}}</span>...........
            CARNET No.
            /
            <br>
            <em>CONTINUAREA LISTEI GENERALE Nr.                          CARNET Nr.</em>
        </div>
        <div id="date">
            <div>{{$carnetNumber}}</div>
        </div>
        <table class="continuation">
            <thead>
            <tr>
                <td rowspan="2">
                    <b>Item No./</b><br> Nr. de ordine
                </td>
                <td rowspan="2">
                    <b>Trade description of goods and marks and numbers, if any/</b><br>Denumirea comercial&#259; a
                    marfurilor
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
            <tfoot>
            <tr>
                <td colspan="2">
                    <b>TOTAL or CARRIED OVER</b>/ TOTAL sau transferat
                </td>
                <td>
                    <b>
                        {{ $page['prevTotals']['pieces'] }}
                    </b>
                </td>
                <td>
                    <b>
                        {{ $page['prevTotals']['weight'] }}
                    </b>
                </td>
                <td>
                    <b>
                        {{ $page['prevTotals']['value'] }}
                    </b>
                </td>
                <td></td>
                <td style="border-style: none solid"></td>
            </tr>
            </tfoot>
            <tbody id="content">
            <tr class="tdWithoutBorder item_header">
                <td></td>
                <td></td>
                <td></td>
                <td>{{$header['unit']}}</td>
                <td>{{$header['value']}}</td>
                <td></td>
                <td></td>
            </tr>
            {{--    Items Render        --}}
            @foreach($page['items'] as $item)
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
                <td>======</td>
                <td>===================================</td>
                <td>=====</td>
                <td>=======</td>
                <td>===========</td>
                <td>=====</td>
                <td></td>
            </tr>
            </tbody>
            {{--          Table Extend              --}}
             @for($row = 0; $row < $page['toExtend']; $row++ )
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
                        {{ $page['totals']['pieces'] }}
                    </b>
                </td>
                <td>
                    <b>
                        {{ $page['totals']['weight'] }}
                    </b>
                </td>
                <td>
                    <b>
                        {{ $page['totals']['value'] }}
                    </b>
                </td>
                <td style="position: relative;">
                    <div class="line"></div>
                </td>
                <td style="border-style: none solid solid"></td>
            </tr>
            </tfoot>
        </table>
        <div id="colon_title">
            <div style="padding: 10px 5px; font-size: 10px;">
                <b>Signature of authorized official and Issuing Association stamp/
                    <span style="display:inline-block; width: 170px;"></span>
                    Signature of Holder /</b> <br>
                <em>Semn&#259;tura oficialului autorizat &#351;i &#351;tampila Asocia&#539;iei Emitente
                    <span style="display:inline-block; width: 215px;"></span>
                    Semn&#259;tura De&#539;in&#259;torului</em>
                <table id="signature_table">
                    <tr>
                        <td>
                            <div></div>
                        </td>
                        <td>
                            <div></div>
                        </td>
                        <td>
                            <div></div>
                        </td>
                    </tr>
                </table>
            </div>
            <b>*Commercial value in country / customs territory of issue and in its currency, unless stated
                differently/*</b>
            Valoarea comercial&#259; &#206;n &#539;ara / teritoriul vamal de emitere a carnetului &#351;i &#206;n moneda
            sa na&#539;ional&#229;
            numai dac&#229; nu se specific&#229; altfel
            <br>
            <b>**Show country of origin if different from country / customs territory of issue of the Carnet, using ISO
                country
                codes /**</b>
            Se indic&#259; &#539;ara de origine dac&#259; este alta dec&#226;t &#539;ara / teritoriul vamal de emitere
            a carnetului, utiliz&#226;nd codul interna&#539;ional ISO al &#539;&#259;rilor
        </div>
    </div>
@endforeach
</body>
</html>
