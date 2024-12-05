<?php
$title = 'PDF Generálás'; // Page title for layout

if (!isset($_SESSION['role'])) {
    header("Location: index.php?page=login");
    exit;
}
?>
<h1 class="text-center">PDF Generálás</h1>
<form action="controllers/generate_pdf.php" method="POST" class="mt-4">
    <div class="mb-3">
        <label for="location" class="form-label">Helyszín (opcionális):</label>
        <input type="text" id="location" name="location" class="form-control">
    </div>
    <div class="mb-3">
        <label for="input1" class="form-label">Ország (opcionális):</label>
        <input type="text" id="input1" name="input1" class="form-control">
    </div>
    <div class="mb-3">
        <label for="input2" class="form-label">Szálloda (opcionális):</label>
        <input type="text" id="input2" name="input2" class="form-control">
    </div>
    <div class="mb-3">
        <label for="input3" class="form-label">Max Ár (opcionális):</label>
        <input type="number" id="input3" name="input3" class="form-control" step="0.01">
    </div>
    <button type="submit" class="btn btn-primary">Generálás</button>
</form>
