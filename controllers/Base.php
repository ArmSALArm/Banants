<?php

/**
 * Created by PhpStorm.
 * User: Suren
 * Date: 11/19/2015
 * Time: 3:02 PM
 */
class Base extends \Controller
{
    public $settings;
    public $langs;

    public function __construct(array $requestParams = [])
    {
        parent::__construct($requestParams);

//        $this->settings = \Setting::instance()->get_all_groups();
//        $this->langs = \Lang::instance();
    }
}