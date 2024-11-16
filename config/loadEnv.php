<?php

function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception(".env file not found at $filePath");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        $keyValue = explode('=', $line, 2);
        if (count($keyValue) !== 2) {
            continue;
        }

        $key = trim($keyValue[0]);
        $value = trim($keyValue[1]);

        $_ENV[$key] = $value;
        putenv("$key=$value");
    }
}
