<?php

    spl_autoload_register('autoload');

    function autoload($className): void
    {
        require_once "../classes/$className.classe.php";
    }