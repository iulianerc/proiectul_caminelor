<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 10px;
        }

        #header {
            text-align: center;
            vertical-align: bottom;
            width: 100%;
            line-height: .9;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }

        #left_image, #right_image {
            position: absolute;
            top: -30px;
        }

        #left_image {
            left: -10px;
            font-size: 9px;
        }

        #right_image {
            right: 0;
            text-align: right;
            font-size: 8px;
            width: 200px;
        }

        #left_info {
            position: absolute;
            transform: rotate(-90deg);
            transform-origin: top left;
            left: -20px;
            bottom: 20px;
            font-size: 8px;
            white-space: nowrap;
        }

        #table_container {
            position: absolute;
            top: 75px;
            left: 30px;
            right: 0;
        }

        #table_left_header__en,
        #table_left_header__ro {
            position: absolute;
            top: -1.5px;
            font-size: 14px;
            border: 3px solid;
            padding: 55px 7px 0;
            line-height: 0.9;
            height: 233px;
            /*writing-mode: vertical-lr;*/
            /*text-orientation: upright;*/
        }

        #table_left_header__ro {
            left: -29px;
        }

        #table_left_header__en {
            left: -57.5px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        #main_table tr td {
            border: 3px solid;
            font-size: 9px;
            padding: 5px 5px;
            line-height: .9;
            vertical-align: top;
        }

        #main_table tr td:nth-child(2) {
            width: 55%;
        }

        #main_table tr:nth-child(3) td {
            height: 60px;
        }

        #main_table tr td.countries {
            height: 400px;
            font-size: 10px;
        }

        #valid_date {
            width: 100%;
            margin: 15px 20px 0;
        }

        #valid_date tr td {
            border: none;
            text-align: center;
        }

        #valid_date th {
            border-bottom: 1px dotted;
            padding: 0;
            text-align: center;
            position: relative;
        }

        #valid_date th:first-child {
            width: 100px;
        }

        #valid_date th:nth-child(2),
        #valid_date th:last-child {
            width: 80px;
        }

        #valid_date th b {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 14px;
            font-weight: bolder;
        }

        .letter {
            position: relative;
            padding-left: 15px;
            width: 100%;
        }

        .letter div {
            position: absolute;
            top: 0;
            left: 0;
        }

        .stamp_block {
            position: absolute;
            width: 220px;
            height: 27px;
            border: 1px solid;
            right: 20px;
            top: 5px;
        }

        .stamp_block div {
            position: relative;
            top: 5px;
            left: 5px;
            font-size: 16px;
            text-align: center;
            letter-spacing: 7px;
            color: lightskyblue;
        }

        #replacement {
            position: absolute;
            top: 40px;
            right: 30px;
            width: 130px;
        }

        .text {
            font-size: 12px;
        }

        #countries {
            padding: 10px 20px;
        }

        #countries tr td {
            border: none;
            width: 33%;
            height: 9px;
            padding: 0;
            font-size: 9px;
            position: relative;
        }

        #countries div.included:before {
            content: 'X ';
            font-weight: bolder;
            position: absolute;
            left: -10px;
        }

        #footer_table tr td {
            border: none;
            font-size: 10px;
        }

        #footer_table tr td div.letter {
            padding-left: 25px;
        }

        #footer_table tr:first-child td:first-child div.letter:first-child {
            padding: 0 20px;
            width: 100%;
            margin: 0 0 20px 20px;
        }

        #footer_point__d tr td:nth-child(1) {
            width: 70px;
        }

        #footer_point__d tr td:nth-child(2) {
            width: 12px;
        }

        #footer_point__d tr td:nth-child(3) {
            width: 105px;
        }

        #footer_point__d tr td:nth-child(4) {
            width: 98px;
        }

        #footer_point__d tr:first-child td {
            border-bottom: dotted 1px;
            text-align: center;
            padding: 0;
        }

        #footer_point__d tr:nth-child(2) td {
            text-align: center;
            padding: 5px 0 0;
        }

        #stamp_place {
            height: 80px;
            width: 80px;
            border: 1px dotted;
            border-radius: 40px;
            position: absolute;
            right: 30px;
            top: 130px;
        }

        #applicable {
            position: absolute;
            bottom: -40px;
            left: -15px;
        }
    </style>
</head>
<body>
<div id="left_image">
    <b>Issuing Association</b><br>
    <em>Asocia&#539;ia Emitent&#259;</em>
    <div class="image" style="padding: 5px 0 0 10px;">
        <img
            src="https://firebasestorage.googleapis.com/v0/b/share-img-b242f.appspot.com/o/logo_ro.png?alt=media&token=4af16702-8606-4e6b-b160-a2032a3938e9"
            alt="Issuing Association"
            height="50"
        >
    </div>
</div>
<div id="header">
    <b>A.T.A. CARNET/CARNET A.T.A.</b><br>
    <b>FOR TEMPORARY ADMISSION OF GOODS</b><br>
    <em style="font-size: 12px;">PENTRU ADMITEREA TEMPORAR&#258; A M&#258;RFURILOR</em><br>
    <div style="font-size: 8px;">
        <b>
            CUSTOMS CONVENTION ON THE A.T.A. CARNET FOR THE TEMPORARY ADMISSION OF GOODS<br>
            <em>CONVEN&#538;IA VAMAL&#258; PRIVIND CARNETUL ATA PENTRU ADMITEREA TEMPORAR&#258; A M&#258;RFURILOR
                <br></em>
            CONVENTION ON TEMPORARY ADMISSION/ CONVEN&#538;IA PRIVIND ADMITEREA TEMPORAR&#258;<br>
            (Before completing the Carnet, please read Notes on cover page 3/
        </b>
        &#206;nainte de a completa carnetul, v&#259; rug&#259;m s&#259; citi&#539;i notele de pe pagina 3 a
        copertei)
    </div>
</div>
<div id="right_image">
    <b>INTERNATIONAL GUARANTEE CHAIN</b>
    <div style="position:relative; left: 2px;">
        <em style="letter-spacing: 0.5px;">LAN&#538; DE GARAN&#538;II INTERNATIONALE</em>
    </div>
    <div class="image" style="padding: 10px 30px 0 0;">
        <img
            src="https://firebasestorage.googleapis.com/v0/b/share-img-b242f.appspot.com/o/icc.png?alt=media&token=65e9d31c-64b8-45d0-9436-b91865392a14"
            alt="ICC logo"
            height="50"
        >
    </div>
</div>
<div id="left_info">
    <b>
        TO BR RETURNED TO THE ISSUING CHAMBER IMMEDIATELY AFTER USE/ A SE RETURNA LA CAMERA EMITENT&#258; IMEDIAT DUP&#258;
        UTILIZARE
    </b>
</div>
<div id="table_container">
    <div id="table_left_header__ro">C<br>A<br>R<br>N<br>E<br>T<br><br><br>A<br>T<br>A</div>
    <div id="table_left_header__en"><b>A<br>T<br>A<br><br><br><br>C<br>A<br>R<br>N<br>E<br>T</b></div>
    <table id="main_table">
        <tr>
            <td rowspan="2" id="holder" style="height: 30px;">
                <b>A. HOLDER AND ADDRESS</b>/<em>Titular &#351;i Adresa</em><br>
                <div class="text">
                    {{$holder['id']}}<br>
                    {{$holder['name']}}<br>
                    {!!$address!!}
                </div>
            </td>
            <td>
                <b>G. FOR ISSUING ASSOCIATION USE</b><em>/ Rezervat asocia&#539;iei emitente</em>
                <div style="text-align: center"><b>FRONT COVER/ </b>Coperta</div>
            </td>
        </tr>
        <tr>
            <td style="position:relative;">
                <div class="stamp_block">
                    <div>
                        {{$carnetNumber}}
                    </div>
                </div>
                @if($replacement)
                    <div id="replacement">
                        <b>{!! $replacement !!}</b>
                    </div>
                @endif
                <div class="letter">
                    <div><b>a) </b></div>
                    <b>CARNET No. <br></b>
                    <em>Carnet Nr.</em><br>
                    <br>
                    <b>Number of continuation sheets:</b><br><br>
                    <em>Num&#259;rul filelor &#238;n continuare   <b>{{$continuationSheetCount}}</b>.......</em>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <b>B. REPRESENTED BY*</b>/
                <em>Reprezentat de*</em><br>
                <div class="text">
                    {!! $representedBy['name'] ?? $representedBy['all'] !!}
                </div>
            </td>
            <td>
                <div style="padding-left: 7px;">
                    <b>b) ISSUED BY /</b> Eliberat de<br>
                </div>
                <div class="text">
                    {{$issuedBy}}
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="letter">
                    <div><b>C. </b></div>
                    <b>INTENDED USE OF GOODS/ </b><em>Utilizarea prev&#259;zut&#259; a m&#259;rfurilor</em><br>
                </div>
                <div class="text">
                    {{$usage}}
                </div>
            </td>
            <td>
                <div class="letter">
                    <div>
                        <b>c)</b>
                    </div>
                    <b>VALID UNTIL/ </b><em>Valabil p&#226;n&#259; la</em>
                </div>
                <table id="valid_date">
                    <tr>
                        <th>{{$validTo['year']}}<b>/</b></th>
                        <th>{{$validTo['month']}}<b>/</b></th>
                        <th>{{$validTo['day']}}</th>
                    </tr>
                    <tr>
                        <td><b>year</b><br><em>anul</em></td>
                        <td><b>month</b><br><em>luna</em></td>
                        <td><b>day(inclusive)</b><br><em>anul(inclusiv)</em></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="countries" style="text-align: justify">
                <div style="text-align: justify">
                    <b>P. This carnet may be used in the following countries/Customs territories under the guarantee of
                        the associations listed on page four of the cover</b><em>: / Prezentul carnet este valabil
                        &#206;n &#539;&#259;rile/teritoriile vamale de mai jos, sub garan&#539;ia asocia&#539;iilor
                        enumerate pe pagina patru a copertei:</em><br>
                </div>
                <table id="countries">
                    <tr>
                        <td>
{{--                            Standard 29 in column                       --}}
                            @for($i = 0; $i < 28; $i++)
                                <div class="{{in_array($countries[$i], $includedCountries) ? 'included' : ''}}">
                                    <b>{{$countries[$i]}}</b></div>
                            @endfor
                        </td>
                        <td>
                            @for($i = 0; $i < 27; $i++)
                                <div class="{{in_array($countries[$i + 28], $includedCountries) ? 'included' : ''}}">
                                    <b>{{$countries[$i + 28]}}</b></div>
                            @endfor
                        </td>
                        <td>
                            @for($i = 0; $i < 28; $i++)
                                @if($i + 55 < count($countries))
                                    <div
                                        class="{{in_array($countries[$i + 55], $includedCountries) ? 'included' : ''}}">
                                        <b>{{$countries[$i + 55]}}</b></div>
                                @else
                                    <div></div>
                                @endif
                            @endfor
                        </td>
                    </tr>
                </table>
                <b>
                    The holder of this Carnet and his representative will be held responsible for compliance with laws
                    and regulations of the
                    country/Customs territory of departure and the countries/Customs territories of importation./
                    <em>
                        De&#539;in&#259;torul acestui Carnet &#351;i reprezentatul acestuia va fi responsabil pentru
                        &#238;nc&#259;lcarea legilor &#351;i
                        regulament&#259;rilor &#539;&#259;rilor/teritoriilor vamale de plecare &#351;i &#539;&#259;rilor/teritoriilor
                        vamale de import.
                    </em>
                </b>
            </td>
        </tr>
        <tr>
            <td style="padding: 0;" colspan="2">
                <table id="footer_table">
                    <tr>
                        <td style="padding-top: 13px; height: 120px;border-right: 3px solid; position:relative; background-color: rgb(200, 200, 200);">
                            <div class="letter">
                                <div><b>H. </b></div>
                                <b>CERTIFICATE BY CUSTOMS AT DEPARTURE /</b><br>
                                <em>Atestarea autorit&#259;&#539;ilor vamale la plecare</em>
                            </div>
                            <div class="letter">
                                <div><b>a)</b></div>
                                <b>Identification marks have affixed as indicated in column 7 against the following item
                                    No(s) of the General List</b><br>
                                <em>
                                    Ma&#259;rcile de identificare men&#539;ionate &#238;n coloana 7 au fost aplicate
                                    &#238;n dreptul num&#259;rul (numerelor) de ordine
                                    urm&#259;tor (oare) din lista general&#259;
                                    <br><br>
                                </em>
                                ..................................................................................................................
                                <br><br>
                            </div>
                            <div class="letter">
                                <div><b>b)</b></div>
                                <span style="display: block; padding-bottom: 3px;">
                                    <b>GOODS EXAMINED*/</b>Verificat m&#259;rfurile*<br>
                                </span>
                                  <b> Yes</b>/ Da ☐                       
                                <b>No</b>/ Nu ☐
                                <br><br>
                            </div>
                            <div class="letter" style="line-height: 1.2;">
                                <div><b>c)</b></div>
                                <b>Registered under Reference No.*</b>........................ <br>
                                <em>&#206;nregistrat sub Nr.*</em><br><br><br>
                            </div>
                            <div class="letter">
                                <div><b>d)</b></div>
                                <table id="footer_point__d">
                                    <tr style="">
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:center; font-weight: bolder; font-size: 14px;">/</td>
                                        <td style="text-align:left; font-weight: bolder; font-size: 14px">/</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Customs Office</b><br>
                                            <em>Biroul vamal</em>
                                        </td>
                                        <td>
                                            <b>Place</b><br>
                                            <em>Locul</em>
                                        </td>
                                        <td>
                                            <b>Date (year/month/day)</b><br>
                                            <em>Data (anul/luna/ziua)</em>
                                        </td>
                                        <td>
                                            <b>Signature and Stamp</b><br>
                                            <em>Semn&#259;tura &#351;i &#351;tampila</em>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div id="stamp_place"></div>
                        </td>
                        <td style="width: 38%; height: 140px; padding: 0;">
                            <table>
                                <tr>
                                    <td style="border-bottom: solid 3px;">
                                        <div class="letter">
                                            <div><b>I.</b></div>
                                            <b>Signature of authorised official and Issuing Association stamp/</b>
                                            <em>Semn&#259;tura delegatului &#351;i &#351;tampila asocia&#539;iei
                                                emitente</em><br>
                                        </div>
                                        <div style="text-align: center; padding-top: 5px;"><b>{{$authorizedPerson}}</b></div>
                                        <table id="valid_date" style="padding: 25px 0 20px; margin-left: 5px;">
                                            <tr>
                                                <th style="width: 80px;">{{$validFrom['year']}}<b>/</b></th>
                                                <th style="width: 60px;">{{$validFrom['month']}}<b>/</b></th>
                                                <th style="width: 60px;">{{$validFrom['day']}}</th>
                                            </tr>
                                        </table>
                                        <b>Place and Date of issue (year/month/day)</b><br>
                                        Locul &#351;i data emiterii          (anul/luna/ziua)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="position:relative;">
                                        <b>J.</b>
                                        <div
                                            style="position:absolute; top: 72px; left: 10px; right: 10px; line-height: 1.2;">
                                            <span style="font-weight: 900; font-size: 14px;">X</span>................................................................<span
                                                style="font-weight: 900; font-size: 14px;">X</span><br>
                                            <b>Signature of Holder</b>
                                            <em>/Semn&#259;tura titularului</em>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div id="applicable">
    *<b>If applicable</b>
    <em>/ * Dac&#259; este cazul</em>
</div>
</body>
</html>
