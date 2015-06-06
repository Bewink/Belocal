<?php

spl_autoload_register(
    function ($sNamespace) {
        $sPath = str_replace('\\', '/', ROOT_DIR . $sNamespace . '.php');

        if (is_file($sPath)) {
            require $sPath;
        }
    }
);
