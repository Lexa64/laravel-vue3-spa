<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Данные записи</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h1>Информация о записи #{{ $data['id'] }}</h1>

<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Значение</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $value)
        <tr>
            <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
            <td>{{ $value ?? 'Не указано' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<footer style="margin-top: 20px; text-align: right; font-size: 0.8em;">
    Сгенерировано: {{ now()->format('d.m.Y H:i') }}
</footer>
</body>
</html>
