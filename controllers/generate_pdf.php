<?php
require_once __DIR__ . '/../config.php';
require_once SERVER_ROOT . 'db.php';
require_once SERVER_ROOT . 'libs/tcpdf/tcpdf.php';

session_start();

// Check user role (allow access for ROLE_USER and ROLE_ADMIN)
if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['ROLE_USER', 'ROLE_ADMIN'])) {
    header("Location: " . SITE_ROOT . "index.php?page=login");
    exit;
}

// Handle POST request for PDF generation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = $_POST['location'];
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $maxPrice = $_POST['input3'];

    $sql = "
        SELECT 
            h.orszag AS orszag,
            h.nev AS helyszin, 
            sz.nev AS szalloda, 
            t.indulas AS kezdes, 
            t.idotartam AS idotartam, 
            t.ar AS ar
        FROM helyseg h
        JOIN szalloda sz ON h.az = sz.helyseg_az
        JOIN tavasz t ON sz.az = t.szalloda_az
        WHERE 1=1
    ";

    $params = [];

    if (!empty($location)) {
        $sql .= " AND h.nev = ?";
        $params[] = $location;
    }
    if (!empty($input1)) {
        $sql .= " AND h.orszag LIKE ?";
        $params[] = "%$input1%";
    }
    if (!empty($input2)) {
        $sql .= " AND sz.nev LIKE ?";
        $params[] = "%$input2%";
    }
    if (!empty($maxPrice)) {
        $sql .= " AND t.ar <= ?";
        $params[] = $maxPrice;
    }

    $query = $pdo->prepare($sql);
    $query->execute($params);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Az Ön Alkalmazása');
    $pdf->SetTitle('Generált PDF');
    $pdf->SetHeaderData('', 0, 'Generált PDF', "Generálva: " . date('Y-m-d H:i:s'));
    $pdf->setHeaderFont(['helvetica', '', 10]);
    $pdf->setFooterFont(['helvetica', '', 8]);
    $pdf->AddPage();

    $html = '<h1>Generált PDF</h1>';
    if ($data) {
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr>
                    <th>Ország</th>
                    <th>Helyszín</th>
                    <th>Szálloda</th>
                    <th>Kezdés</th>
                    <th>Időtartam</th>
                    <th>Ár</th>
                  </tr>';
        foreach ($data as $row) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['orszag']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['helyszin']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['szalloda']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['kezdes']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['idotartam']) . ' nap</td>';
            $html .= '<td>' . htmlspecialchars($row['ar']) . ' HUF</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
    } else {
        $html .= '<p>A megadott szűrési feltételek alapján nem található adat.</p>';
    }
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('generated_pdf.pdf', 'I');
    exit;
}

// Redirect to the PDF form view if not a POST request
header("Location: " . SITE_ROOT . "index.php?page=pdf_form");
exit;
