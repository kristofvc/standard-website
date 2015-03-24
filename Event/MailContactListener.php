<?php

namespace Kristofvc\Contact\Event;

/**
 * Class MailContactListener
 * @package Kristofvc\Contact\Event
 */
final class MailContactListener
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @param \Swift_Mailer $mailer
     * @param $from
     * @param $to
     */
    public function __construct(\Swift_Mailer $mailer, $from, $to)
    {
        $this->mailer = $mailer;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param ContactEvent $event
     */
    public function sendMail(ContactEvent $event)
    {
        $contact = $event->getContact();

        $message = \Swift_Message::newInstance()
            ->setSubject($contact->getSubject())
            ->setFrom($this->from)
            ->setTo($this->to)
            ->setReplyTo($contact->getEmail())
            ->setBody($contact->getMessage());

        $this->mailer->send($message);
    }
}