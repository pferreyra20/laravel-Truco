<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * Los proxies confiables. Usar "*" para confiar en todos.
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * Los encabezados que se usarán para detectar proxies y protocolo HTTPS.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
