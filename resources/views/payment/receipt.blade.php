<!DOCTYPE html>
<html>
<head>
    <title>Recibo de Pago</title>
</head>
<body>
    <h1>Recibo de Pago</h1>
    <p>Fecha de vencimiento: {{ date_format(new \DateTime($esp->expiration_date), 'Y-m-d') }}</p>
    <p>Monto pagado: 100$ </p>
</body>
</html>