<?php


function BaseController($file = null)
{
    return  "application\controllers\\$file ";
}


function baseModel($file = null)
{
    return  "application\models\\$file ";
}
