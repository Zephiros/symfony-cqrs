<?php

namespace App\Kernel\API;

use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializerBuilder;

class ApiResponse extends JsonResponse
{
    public function __construct(mixed $data = null, int $status = 200, array $headers = [], bool $json = false)
    {
        $serializedData = SerializerBuilder::create()->build()->serialize($data, 'json');

        if ($json) {
            parent::__construct($data, $status, $headers, $json);
        } else {
            $associative = gettype($serializedData) === "array";

            parent::__construct(json_decode($serializedData, $associative), $status, $headers);
        }
    }
}