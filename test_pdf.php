<html>

<head>
    <title>ใบเสนอราคา</title>
</head>

<body>
    <?php
    include('fpdf/fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage('Portrait', 'A4');
    $pdf->AddFont('angsa', '', 'angsa.php');
    $pdf->SetFont('angsa', '', 16);
    $pdf->Cell(0, 20, iconv('UTF-8', 'TIS-620', 'สวัสดีชาวโลก'), 0, 1, "C");
    $pdf->Output("report.pdf", "F");
    ?>
    <meta http-equiv='refresh' content='0 ; url=report.pdf'>
</body>

</html>