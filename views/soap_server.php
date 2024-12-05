<?php
$title = 'SOAP Szerver';
?>
<h1 class="text-center">SOAP Szerver</h1>

<p>
    Ez a SOAP szerver lehetővé teszi a <strong>tavasz</strong> táblázat adatainak kezelését. Az alábbi funkciók állnak rendelkezésre:
</p>

<h2>Elérhető funkciók</h2>
<pre>
<b>Get all records:</b>
Function: getAll
Parameters: Nincs

<b>Get record by ID:</b>
Function: getById
Parameters:
    - id: A rekord azonosítója (tavasz.sorszam)

<b>Add a new record:</b>
Function: add
Parameters:
    - indulas: Indulás dátuma
    - idotartam: Időtartam (napokban)
    - ar: Ár (HUF-ban)
    - szallodaAz: Szálloda azonosítója

<b>Update a record:</b>
Function: update
Parameters:
    - sorszam: Rekord azonosítója
    - indulas: Új indulás dátuma
    - idotartam: Új időtartam (napokban)
    - ar: Új ár (HUF-ban)
    - szallodaAz: Új szálloda azonosítója

<b>Delete a record:</b>
Function: delete
Parameters:
    - sorszam: A rekord azonosítója
</pre>

<p>
    A SOAP szervert az alábbi címen érheti el:
    <code><?php echo SITE_ROOT . 'controllers/soap.php'; ?></code>
</p>
<p>
    Használjon SOAP kliens eszközt, például <a href="https://www.soapui.org/" target="_blank">SoapUI</a>, a funkciók teszteléséhez.
</p>
