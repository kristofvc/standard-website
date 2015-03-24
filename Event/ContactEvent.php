<?php

namespace Kristofvc\Contact\Event;

use Kristofvc\Contact\Model\ContactInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ContactEvent
 * @package Kristofvc\Contact\Event
 */
class ContactEvent extends Event
{
    /**
     * @var ContactInterface
     */
    private $contact;

    /**
     * @param ContactInterface $contact
     * @return ContactEvent
     */
    public static function createWith(ContactInterface $contact) {
        return new ContactEvent($contact);
    }

    /**
     * @param ContactInterface $contact
     */
    public function __construct(ContactInterface $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return ContactInterface
     */
    public function getContact()
    {
        return $this->contact;
    }
}