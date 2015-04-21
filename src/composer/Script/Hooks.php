<?php

namespace Kristofvc\Composer\Script;

use Composer\Script\Event;

class Hooks
{
    public static function installHooks(Event $event)
    {
        $io = $event->getIO();

        $gitHook = @file_get_contents(__DIR__.'/../../../.git/hooks/pre-commit');
        $neededHook = @file_get_contents(__DIR__.'/../../../git/pre-commit-hook.php');

        if ($gitHook !== $neededHook) {
            $io->write('<info>Setting up pre-commit hooks!</info>');
            exec('sh ' . __DIR__ . '/../../../git/pre-commit-hook-installer.sh');
        }

        $io->write('<info>Pre-commit hooks installed!</info>');
        return true;
    }
}
