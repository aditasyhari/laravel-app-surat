<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @page {
            margin-top: {{ $m_atas }} mm;
            margin-bottom: {{ $m_bawah }} mm;
            margin-left: {{ $m_kiri }} mm;
            margin-right: {{ $m_kanan }} mm;
        }
    </style>
</head>
<body>
    {{ $layout_kop }}
    <br>
    {{ $layout_konten }}
</body>
</html>