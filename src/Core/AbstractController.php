<?php
namespace App\Core;
/**
 * Class AbstractController
 * @package App\Core
 */
abstract class AbstractController
{
    /**
     * @param $view
     * @param $parameter
     */
    protected function render($view, $parameter)
    {
        extract($parameter);
        include "view/{$view}.php";
    }
}