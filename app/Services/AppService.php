<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class AppService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the authors service
     * @var string
     */
    public $baseUri;

//    /**
//     * The secret to consume the authors service
//     * @var string
//     */
    public $secret;
//    public $salt_connection;

    public function __construct()
    {
        $this->baseUri = config('services.omang.base_uri');
        $this->secret = config('services.omang.secret');
//        $this->salt_connection = config('services.cache.salt_connection');
    }

    /**
     * Obtain the full list of author from the author service
     * @return string
     */
    public function validate($idno)
    {
        // return $this->performRequest('GET', "/validate/$idno");
        return $this->performRequest('GET', "validate/$idno");
    }

    /**
     * Obtain the full list of author from the author service
     * @return string
     */
    public function verify($omang)
    {
        return $this->performRequest('GET', "/verify/$omang");
    }
}
