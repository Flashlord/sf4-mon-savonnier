<?php
/**
 * Created by PhpStorm.
 * User: d4rkfl4sh
 * Date: 02/07/18
 * Time: 21:53
 */

namespace App\Controller;

use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class BaseController extends FOSRestController
{
	protected function sendResponse($data, $errorCode)
	{
		$context = (new Context())->addGroup('Default');
		return $this->handleView(View::Create($data,$errorCode)->setContext($context));
	}
}