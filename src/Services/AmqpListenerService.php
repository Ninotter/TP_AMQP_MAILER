<?php
namespace App\Services;

use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class AmqpListenerService{
    private $connection;
    private $channel;

    public function init(){
        try{
            $this->connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
            $this->channel = $this->connection->channel();
            $this->channel->queue_declare('email', false, false, false, false);
        }
        catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function setCallback($callback){
        $this->channel->basic_consume('email', '', false, true, false, false, $callback);
    }
}