<?php

namespace App\Serializer\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AbstractManager
{
	protected $em;
	protected $validator;
	
	/**
	 * AbstractManager constructor.
	 *
	 * @param EntityManagerInterface $em
	 * @param ValidatorInterface $validator
	 */
	public function __construct(EntityManagerInterface $em, ValidatorInterface $validator)
	{
		$this->em = $em;
		$this->validator = $validator;
	}
	
	/**
	 * Validate entity
	 * @param $model
	 */
	protected function validateEntity($model)
	{
		/** @var ConstraintViolationList $errors */
		$errors = $this->validator->validate($model);
		if(count($errors)) throw new BadRequestHttpException($errors[0]->getMessage());
	}
}