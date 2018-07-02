<?php

namespace App\Listeners;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
	public function onKernelException(GetResponseForExceptionEvent $event)
	{
		$event->setResponse(new JsonResponse("error, error"));
	}
}