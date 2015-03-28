<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace Kristofvc\Contact\Event;

/**
 * Class ContactEvents
 * @package Kristofvc\Contact\Event
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
final class ContactEvents
{
    /**
     * This event is thrown when somebody submits the contact-form
     */
    const CONTACT_SUBMITTED_EVENT = 'contact.contact_submitted_event';
}
