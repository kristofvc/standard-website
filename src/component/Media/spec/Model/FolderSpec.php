<?php

namespace spec\Kristofvc\Component\Media\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FolderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kristofvc\Component\Media\Model\Folder');
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function it_can_fetch_the_name()
    {
        $this->setName('Pictures');
        $this->getName()->shouldReturn('Pictures');
    }

    function it_can_have_sub_folder()
    {
        $this->setSubFolder('HelloKitty');
    }
}
