<?php

declare(strict_types=1);

date_default_timezone_set('America/La_Paz');

/**
 * Configuracion SIAT centralizada.
 * Ajusta aqui CUIS/CUFD por punto de venta (0 y 1).
 */
function obtenerDatosSiat(int $codigoPuntoVenta): array
{
    $config = [
        'nit' => '5062436018',
        'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJjaGljaGFuYXR5QGdtYWlsLmNvbSIsImNvZGlnb1Npc3RlbWEiOiIzNzFGOTk2OTJEQTBERDRENDFERSIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTFNRE15TVRZek1MUUFBSFYxSVZrS0FBQUEiLCJpZCI6NTIyNzQ1NSwiZXhwIjoxODA0ODMxMzQ1LCJpYXQiOjE3NzMzOTYxMTUsIm5pdERlbGVnYWRvIjo1MDYyNDM2MDE4LCJzdWJzaXN0ZW1hIjoiU0ZFIn0.Bf-_BNKpY_-AJyRvep6H_q3S_Eaqpm4xpalEe9vBY9AcojCVBA8tWlYNwpo8W_UVyRRGOO_rWJaKKES39XiEKA',
        'codigoAmbiente' => 2,
        'codigoSistema' => '371F99692DA0DD4D41DE',
        'codigoSucursal' => 0,
        'codigoModalidad' => 2,
        'puntosVenta' => [
            0 => [
                'cuis' => 'F498F4FF',
                'cufd' => 'FBQT5Ca1lHRkE=EwREQ0RDQxREU=QzlXVVJHT0RhVUMzcxRjk5NjkyRE',
                'codigoControl' => '12A0051BB5AAF74',
            ],
            1 => [
                'cuis' => '6ED780F4',
                'cufd' => 'JBQT5Ca1lHRkE=EwREQ0RDQxREU=Q3lXa1JHT0RhVUMzcxRjk5NjkyRE',
                'codigoControl' => '812F351BB5AAF74',
            ],
        ],
    ];

    if (!isset($config['puntosVenta'][$codigoPuntoVenta])) {
        throw new InvalidArgumentException('Punto de venta no configurado: ' . $codigoPuntoVenta);
    }

    $puntoVenta = $config['puntosVenta'][$codigoPuntoVenta];

    return [
        'nit' => $config['nit'],
        'token' => $config['token'],
        'codigoAmbiente' => $config['codigoAmbiente'],
        'codigoSistema' => $config['codigoSistema'],
        'codigoSucursal' => $config['codigoSucursal'],
        'codigoModalidad' => $config['codigoModalidad'],
        'codigoPuntoVenta' => $codigoPuntoVenta,
        'cuis' => $puntoVenta['cuis'],
        'cufd' => $puntoVenta['cufd'],
        'codigoControl' => $puntoVenta['codigoControl'],
    ];
}
