<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 9px;
        }
        .upper {
            text-transform: uppercase;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: auto;
        }
        table tr th {
            text-align: center;
            font-weight: 600;
            font-size: 13px;
        }
        table tr td {
            text-align: justify;
        }
        table tr th:nth-child(even),
        table tr td:nth-child(even) {
            width: 45%;
        }
        table tr th:nth-child(odd),
        table tr td:nth-child(odd) {
            width: 5%;
            text-align: center;
        }
        table tr th,
        table tr td {
            padding: 5px;
            vertical-align: top;
        }
        #footer {
            position: absolute;
            bottom: -20px;
            left: 10px;
        }
        #footer .text {
            position: absolute;
            top: 0;
            left: 130px;
            font-size: 13px;
        }
    </style>
</head>
<body>
<?php
    $count = 0
?>
<table>
    <tr>
        <th class="count"></th>
        <th class="upper">notes on the use of a.t.a carnet</th>
        <th class="count"></th>
        <th class="upper">instruc&#539;iuni privind folosirea carnetului ata</th>
    </tr>
    <tr>
        <?php
            $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>
            All goods covered by the Carnet shall be entered in columns 1 t0 6 of the General List. I the space provided for the General List on the
            reverse of the front cover is insufficient, continuation sheets shall be used.
        </td>
        <td class="count">{{$count}}.</td>
        <td>Toate m&#259;rfurile plasate sub acoperirea carnetului trebuie s&#259; figureze &#238;n coloanele 106 din lista general&#259;. C&#226;nd spa&#539;iul rezervat acestei liste generale, pe verso-ul copertei, nu este suficient, se pot folosi foi suplimentare conform modelului oficial.</td>
    </tr>
    <tr>
        <?php
            $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>In order to close the Genera List, the totals of columns 3 and 5 shall
            be entered at the end of the list in figures and in writing. If the General
            List (continuation sheets) consists of several pages, the number of
            continuation sheets used shall be stated in figures and in wilting in Box
            G of the front cover.</td>
        <td class="count">{{$count}}.</td>
        <td>Pentru a marca sf&#226;r&#351;itul Listei Generale, trebuie s&#259; se men&#539;ioneze la urm&#259;, &#238;n cifre &#351;i litere, totalul coloanelor 3 &#351;i 5. Dac&#259; Lista General&#259; con&#539;ine mai multe pagini, num&#259;rul foilor suplimentare trebuie s&#259; fie indicat &#238;m cifre &#351;i litere &#238;n partea de jos de pe verso-ul copertei. Acela&#351;i precedeu trebuie folosit &#351;i pentru lista voletelor.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>Each item shall be given an item number which shall be entered in
            column 1. Goods comprising several separate pars (including spare
            parts and accessories) may be given a single tem number. If so, the
            nature, the value and, if necessary, the weight of each separate part
            shall be entered in column 2 and only the total weight and value
            should appear in columns 4 and 5.</td>
        <td class="count">{{$count}}.</td>
        <td>
            Fiecare marf&#259; trebuie s&#259; fie numerotat&#259; cu un num&#259;r de ordine care trebuie &#238;nscris &#238;n coloana 1.
            M&#259;rfurile care con&#539;in p&#259;r&#539;i separate (inclusiv piesele de schimb &#351;i accesoriile) pot fi numerotate cu un singur num&#259;r de ordine.
            &#206;n acest caz, trebuie s&#259; se precizeze &#238;n coloana 2 natura, valoarea &#351;i, dac&#259; este necesar, greutatea fiec&#259;rei p&#259;r&#539;i, &#238;n coloanele 4 &#351;i 5 urm&#238;nd s&#259; figureze numai greutatea total&#259; &#351;i valoarea total&#259;.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>When making out the list on the vouchers, the same item numbers shall be used as on the General List</td>
        <td class="count">{{$count}}.</td>
        <td>La stabilirea listelor voletelor trebuie folosite acelea&#351;i numere de ordine ca &#351;i cele din Lista General&#259;.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>To facilitate Customs control, it is recommended that the goods (including separate parts thereof) be clearly marked with the corresponding item number.</td>
        <td class="count">{{$count}}.</td>
        <td>Pentru a facilita controlul vamal, este recomandat s&#259; se indice cite&#539;, pe fiecare marf&#259; (inclusiv p&#259;r&#539;ile separate), num&#259;rul de ordine corespunz&#259;tor.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>Items answering to the same description may be grouped, provided that each item so grouped is given a separate item number. If the items grouped are not of the same value, or weight, their respective values, and, if necessary, weights shall be specified in column 2.</td>
        <td class="count">{{$count}}.</td>
        <td>M&#259;rfurile de acela&#351;i fel pot fi grupate, cu condi&#539;ia c&#259; fiec&#259;reia dintre ele s&#259; i se dea un num&#259;r de ordine. Dac&#259; m&#259;rfurile grupate nu au aceea&#351;i valoare sau greutate, trebuie indicat&#259;, &#238;n coloana 2, valoarea, respectiv greutatea lor, dac&#259; este cazul.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>If the goods are for exhibition, the importer is advised in his own interest to enter in Box C of the importation voucher the name and address of the exhibition and of its organiser.</td>
        <td class="count">{{$count}}.</td>
        <td>&#206;n cazul m&#259;rfurilor destinate unei expozi&#539;ii, se recomand&#259; importatorului, &#238;n propriul s&#259;u interes, s&#259; indice &#238;n caseta C a voletului de import denumirea  expozi&#539;iei &#351;i locul unde are loc, precum &#351;i numele &#351;i adresa organizatorului ei.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>The Carnet shall be completed legible and using permanent link.</td>
        <td class="count">{{$count}}.</td>
        <td>Carnetul trebuie completat cite&#539; &#238;n a&#351;a fel &#238;n&#226;t &#238;nscrierile s&#259; nu poat&#259; fi &#351;terse.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>All goods covered by the Carnet should be examined and registered in the country/Customs territory of departure and, for this purpose should be presented together with the Carnet to the Customs there, except in cases where the Customs regulations of that country/Customs territory do not provide for such examination.</td>
        <td class="count">{{$count}}.</td>
        <td>Toate m&#259;rfurile puse sub acoperirea carnetului trebuie s&#259; fie verificate &#351;i luate &#238;n eviden&#539;&#259; &#238;n &#539;ara de plecare &#351;i prezentate, &#238;n acest scop,
            &#238;mpreun&#259; cu carnetul, autorit&#259;&#539;ilor vamale, cu excep&#539;ia cazurilor &#238;n care aceast&#259; verificare nu este precizat&#259; &#238;n legisla&#539;ia vamal&#259; din &#539;ara respectiv&#259;.
        </td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>If the Carnet has been completed in a language other than that of the country/Customs territory of importation, the Customs may require a translation.</td>
        <td class="count">{{$count}}.</td>
        <td>C&#226;nd carnetul este completat &#238;ntr-o alt&#259; limb&#259; dec&#226;t cea a &#539;&#259;rii de import, autorit&#259;&#539;ile vamale pot cere o traducere.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>Expired Carnet and Carnets which the holder does not intend to use again  shall be returned by him to the issuing association.</td>
        <td class="count">{{$count}}.</td>
        <td>Titularul restituie asocia&#539;iei emitente carnetele expirate sau cele pe care nu inten&#539;ioneaz&#259; s&#259; le mai foloseasc&#259;.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>Arabic numerals shall be used throughout.</td>
        <td class="count">{{$count}}.</td>
        <td>Orice numerotare trebuie s&#259; fie exprimat&#259; &#238;n cifre arabe.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>In accordance with ISO Standard 8601, dates must be entered inn the following order : year/month/day.</td>
        <td class="count">{{$count}}.</td>
        <td>&#206;n conformitate cu standartul ISO 8601, datele trebuie s&#259; apar&#259; &#238;n ordinea urm&#259;toare: anul/luna/ziua.</td>
    </tr>
    <tr>
        <?php
        $count++
        ?>
        <td class="count">{{$count}}.</td>
        <td>
            When blue transit sheets are used, the holder is required to present the Carnet to the Customs office placing the goods in transit and subsequently,
            within the time limit prescribed fir transit, to the specified Customs "office of destination".
            Customs must stamp and sign the transit vouchers and counterfoils appropriately at each stage.
        </td>
        <td class="count">{{$count}}.</td>
        <td>
            C&#226;nd se utilizeaz&#259; foile de tranzit de culoare albastr&#259; pentru o opera&#539;iune de tranzit titularul este obligat s&#259;
            prezinte carnetul birului vamal care plaseaz&#259; m&#259;rfurile &#238;n tranzit &#351;i apoi, &#238;n cadrul timpului limit&#259; acordat pentru aceast&#259; opera&#539;iune, biroului numit
            &#8222;biroul de destina&#539;ie&#8221; a tranzitului. Autoritatea vamal&#259; trebuie s&#259; &#351;tampileze &#351;i s&#259; semneze voletele de tranzit &#351;i cotoarele &#351;i s&#259; le dea cursul corespunz&#259;tor.
        </td>
    </tr>
</table>
<div id="footer">
    <div style="position:relative;">
        <img src="https://firebasestorage.googleapis.com/v0/b/share-img-b242f.appspot.com/o/icc.png?alt=media&token=65e9d31c-64b8-45d0-9436-b91865392a14"
             height="50"
             alt="W.C.F. Img">
        <div class="text">
            <b>
                International Chamber of Commerce <br>
                World Chambers Federation
            </b>
        </div>
    </div>
</div>
</body>
</html>
