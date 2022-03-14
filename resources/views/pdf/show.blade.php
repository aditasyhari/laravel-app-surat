<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $nomor_surat }}</title>
    
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
    <div>
        {!! $layout_kop !!}
        {!! $layout_konten !!}
    </div>
</body>
</html>