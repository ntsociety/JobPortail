<!-- resources/views/pdf/view.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF</title>
</head>
<body>
    <iframe src="{{ asset($pdfPath) }}" style="width: 100%; height: 500px;"></iframe>
</body>
</html>
