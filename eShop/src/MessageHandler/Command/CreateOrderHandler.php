<?php

namespace App\MessageHandler\Command;

use App\Message\Command\CreateOrder;

class CreateOrderHandler {


    public function __invoke(CreateOrder $createOrder)
    {
        var_dump($createOrder);
        //send an email to client confirming the order(product name, amount, price, etc.)
        
        //update warehouse database to keep stock up to update in physical stores
        return 'result from database';
    }
}