<?php

/**
 * Created by PhpStorm.
 * User: qinchong
 * Date: 2016/7/28
 * Time: 11:42
 */
class Service
{

    public function HelloWorld()
    {
        return "Hello";
    }

    public function Add($a, $b)
    {
        return $a + $b;
    }

    public function stu($id)
    {
        sleep(10);
        return 'name' . $id;
    }

    public function tea($id)
    {
        return 'name----' . $id;
    }
}