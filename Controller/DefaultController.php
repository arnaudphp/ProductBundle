<?php

namespace Leoo\Sourcing\ProductBundle\Controller;

use Guzzle\Http\Exception\ClientErrorResponseException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $sourcingProduct = $this->get("leoo_sourcing_product");

        $result = $sourcingProduct->getProducts();

        $products = json_decode($result->getBody(true));

        foreach($products as $product) {
            $request = $sourcingProduct->getProduct($product);

            dump(json_decode($request->getBody(true)));
        }

        die('ok');

        return $this->render('LeooSourcingProductBundle:Default:index.html.twig');
    }
}
