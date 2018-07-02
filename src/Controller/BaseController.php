<?php
/**
 * Created by PhpStorm.
 * User: d4rkfl4sh
 * Date: 02/07/18
 * Time: 21:53
 */

namespace App\Controller;


use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BaseController extends FOSRestController
{
	protected $validator;
	protected $em;
	
	public function __construct(ValidatorInterface $validator, EntityManagerInterface $em)
	{
		$this->validator = $validator;
		$this->em = $em;
	}
	
	protected function validateEntity($model)
	{
		/** @var ConstraintViolationList $errors */
		$errors = $this->validator->validate($model);
		if(count($errors)) throw new BadRequestHttpException($errors[0]->getMessage());
	}
	
	protected function sendResponse($data, $errorCode)
	{
		$context = (new Context())->addGroup('Default');
		return $this->handleView(View::Create($data,$errorCode)->setContext($context));
	}
}