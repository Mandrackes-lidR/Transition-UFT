<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;

    public function __construct(Repository $config)
    {
        if ($trustedProxies = $_SERVER['CC_REVERSE_PROXY_IPS'] ?? null) {
            $this->proxies = array_merge(['127.0.0.1'], explode(',', $trustedProxies));
        }
        parent::__construct($config);
    }
}
