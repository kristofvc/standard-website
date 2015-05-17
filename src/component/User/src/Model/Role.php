<?php

namespace Kristofvc\Component\User\Model;

use Symfony\Component\Security\Core\Role\Role as BaseRole;

/**
 * Class Role
 * @package Kristofvc\Component\User\Model
 *
 * @author Kristof Van Cauwenbergh <kristof.vancauwenbergh@gmail.com>
 */
class Role extends BaseRole
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
