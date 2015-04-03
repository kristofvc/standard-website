<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace Kristofvc\Contact\Mailer;

use Kristofvc\Contact\Model\ContactInterface;

/**
 * Interface MailerInterface
 * @package Kristofvc\Contact\Mailer
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
interface MailerInterface
{
   /**
     * @param $message
     */
    public function send($message);

    /**
     * @param ContactInterface $contact
     * 
     * @return mixed
     */
    public function createMessage(ContactInterface $contact);
}
