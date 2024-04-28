<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Su reserva ha sido realizada con éxito.</h1>
        <p>Estimado/a {{ $info['user']->name }},</p>
        <p>Le informamos que su reserva ha sido realizada con éxito y no ocurrió ningún problema.</p>
        <p>Los datos de su reserva son los siguientes:</p>
        <p>Numero de cliente: {{$info['user']->id}}</p>
        <p>Fecha de reserva: {{ $info['reserva']->fecha }}</p>
        <p>Pago: Efectuado</p>
        <p>Gracias por confiar en nosotros.</p>
    </body>
</html>
