<?php

namespace App\Controller;


use App\Message\Query\SearchQuery;
use App\Message\Command\CreateOrder;
use App\Message\Command\SignUpSms;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EshopController extends AbstractController
{

    use HandleTrait;


    /**
     * messageBus
     *
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus) 
    {
        $this->messageBus = $messageBus;
    }
    

    /**
     * @Route("/", name="eshop")
     */
    public function index(): Response
    {
        return $this->render('eshop/index.html.twig', [
            'controller_name' => 'EshopController',
        ]);
    }

    /**
     * @Route("/search", name="search" )
     * @return Response
     */
    public function search(): Response {
        $search = "laptops";

        //$this->messageBus->dispatch(new SearchQuery($search));
        $result = $this->handle(new SearchQuery($search));
        return  new Response("Your search results for ".$search.$result);
    }

    /**
     * @Route("/signup-sms", name="signup-sms")
     *
     * @return Response
     */
    public function SignUpSMS(): Response {
        $phonenumber = "111 222 333";
        
        $this->messageBus->dispatch(new SignUpSms($phonenumber));

        return new Response(sprintf('Your phone number %s succesfully signed up to SMS newsletter', $phonenumber));
    }

    /**
     * @Route("/order", name="order")
     *
     * @return Response
     */
    public function order(): Response {
        $productId = 243;
        $productName = 'product name';
        $productAmount = 2;
        //save order in the database

        $this->messageBus->dispatch(new CreateOrder($productId, $productAmount));
        
        
        return new Response('Your succesfully ordered your product '.$productName);
    }

}
