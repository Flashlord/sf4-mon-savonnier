<?php

namespace App\Listeners;


use App\Entity\Customer;
use App\Entity\Title;
use Doctrine\Common\Persistence\ObjectManager;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

class CustomerDeserializeJMSListener implements EventSubscriberInterface
{
	
	private $manager;
	
	public function __construct(ObjectManager $manager)
	{
		$this->manager = $manager;
	}
	
	public static function getSubscribedEvents()
	{
		return array(
			array(
				'event' => 'serializer.pre_deserialize',
				'method' => 'onPreDeserialize',
				'class' => Customer::class, // if no class, subscribe to every serialization
				'format' => 'json', // optional format
			),
		);
	}
	
	public function onPreDeserialize(PreDeserializeEvent $event)
	{
		$data = $event->getData();
		$title = $this->manager->getRepository(Title::class)->findOneBy(['label' => $data['title']]);
		$data['title'] = array("id" =>$title->getId());
		$event->setData($data);
	}
}