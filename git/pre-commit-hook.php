#!/usr/bin/env php
<?php

chdir(dirname(dirname(__DIR__)));

exec('git diff --cached --name-only --diff-filter=ACMR HEAD | grep \\\\.php', $files);

if (!$files) {
    exit(0);
}

$errors = false;

foreach ($files as $file) {
    $needle = 'Spec.php';
    if (!(($temp = strlen($file) - strlen($needle)) >= 0 && strpos($file, $needle, $temp) !== false)) {
        $tmpFile = tempnam(sys_get_temp_dir(), 'pre-commit-hook') . '.php';

        $output = $returnCode = null;
        exec('/usr/bin/env git show :' . $file . ' > ' . $tmpFile . ' 2>&1', $output, $returnCode);

        $output = $returnCode = null;
        exec('/usr/bin/env php -l -d display_errors=0 ' . $tmpFile . ' 2>&1', $output, $returnCode);
        if ($returnCode > 0) {
            echo 'phplint > ' . $file . PHP_EOL;
            echo $file . PHP_EOL;
            echo implode(PHP_EOL, $output) . PHP_EOL;
            echo PHP_EOL;
        }

        $output = $returnCode = null;
        exec('./bin/phpcs --standard=PSR2 ' . $tmpFile . ' 2>&1', $output, $returnCode);
        if ($returnCode > 0
            && $file !== 'app/AppKernel.php'
        ) {
            $errors = true;
            echo 'phpcs > ' . $file . PHP_EOL;
            echo implode(PHP_EOL, array_slice($output, 4, -3)) . PHP_EOL;
            echo PHP_EOL;
        }

        unlink($tmpFile);
    }
}

if ($errors) {
    exit(255);
}
exit(0);
