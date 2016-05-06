<?php

namespace Leoo\Sourcing\ProductBundle\Service;

use Guzzle\Service\Client;
use Symfony\Component\HttpFoundation\Request;

class SourcingProduct {

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function execute($uri)
    {
        $request = $this->client->createRequest(Request::METHOD_POST, $uri, [
            'Accept' => 'application/json',
            'WWW-Authentication' => 'Basic '.base64_encode('dlasserre:password')
        ]);

        try {
            $response = $request->send();
        } catch(\Exception $e) {
            return false;
        }

        return $response;
    }

    public function getProducts()
    {
        return $this->execute('5728df200f00006d1ae293a0');
    }

    public function getProduct(\stdClass $product)
    {
        return $this->execute($product->links->self);
    }

    public function getProductOption()
    {

    }
}