<?php

namespace Kristofvc\Component\Media\Model;

class Folder
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSubFolder($argument1)
    {
        // TODO: write logic here
    }
}
