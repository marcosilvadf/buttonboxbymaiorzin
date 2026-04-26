<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f172a, #020617);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            max-width: 400px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        }

        .icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #cbd5f5;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #22c55e;
            color: #000;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            background: #16a34a;
        }

        .secondary {
            display: block;
            margin-top: 15px;
            font-size: 12px;
            color: #94a3b8;
            text-decoration: none;
        }

        .secondary:hover {
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="icon">⚠</div>

        <h1>{{ $title }}</h1>

        <p>
            {{ $paragraph }}
        </p>

        <a href="{{ $route }}" class="btn">{{ $titleRouth }}</a>
    </div>

</body>
</html>