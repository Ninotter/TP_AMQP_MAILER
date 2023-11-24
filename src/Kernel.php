<?php

namespace App;

use App\Processes\EmailProcess;
use App\Services\AmqpListenerService;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}

$amqpListenerService = new AmqpListenerService();
$amqpListenerService->init();
// $emailProcess = new EmailProcess();
// $amqpListenerService->setCallback(function ($msg) use ($emailProcess) {
//     $emailProcess->SendConfirmEmail($msg->body);
// });