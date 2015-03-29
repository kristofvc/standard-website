<?php

/*
 * This file is part of the kristofvc/contact component.
 *
 * (c) Kristof Van Cauwenbergh
 *
 * For the full copyright and license information, please view the meta/LICENSE
 * file that was distributed with this source code.
 */

namespace Kristofvc\Contact\Provider;

use Kristofvc\Contact\Model\ContactInterface;

/**
 * Class SimpleMessageProvider
 * @package Kristofvc\Contact\Provider
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
final class SimpleMessageProvider implements MessageProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMessage(ContactInterface $contact)
    {
        return sprintf('Thank you for sending me a message %s!', $contact->getName());
    }
}
