<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function index(): Response
    {
        $number = random_int(0, 100);

        return $this->render('home/index.html.twig', [
            'number' => $number,
        ]);
    }

    /**
     * @Route("/product", name="product")
     *
     * @ param Product $product
     *
     * @return Response
     */
    public function getProduct(/*Product $product*/): Response
    {
phpinfo(); exit;

        return $this->render('home/product.html.twig', [
//            'number' => $number,
        ]);
    }
}