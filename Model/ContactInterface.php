<?php

namespace Kristofvc\Contact\Model;

interface ContactInterface
{
    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getSubject();
} 