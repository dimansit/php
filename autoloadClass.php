<?php

spl_autoload_register(function ($class_name) {
    include "model/$class_name.php";
});