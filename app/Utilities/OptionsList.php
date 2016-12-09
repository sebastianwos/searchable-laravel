<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-09-03
 * Time: 09:04
 */

namespace App\Utilities;


abstract class OptionsList {

    private $reflectionClass;

    /**
     * OptionsList constructor.
     */
    public function __construct()
    {
        $this->reflectionClass = new \ReflectionClass($this);
    }


    /**
     * Static factory method - return instance of the class object
     * @return mixed
     */
    public static function make()
    {
        return new static();
    }

    /**
     * Gets collection of all defined const options of the class
     * @param string $default
     * @return $this
     */
    public function getOptions($default = null)
    {
        $consts = collect($this->reflectionClass->getConstants())->flip()->map(function ($item, $key) {
            return trans('langs.option_'.strtolower($item));
        });
        return ($default ? $consts->prepend($default, '') : $consts);
    }

    /**
     * Return options as Array
     * @param null $default
     * @return mixed
     */
    public function getOptionsAsArray($default = null)
    {
        return $this->getOptions($default)->all();
    }

    /**
     * Get specified option name
     * @param null $option
     * @return mixed
     */
    public function getOptionName($option = null)
    {
        return $this->getOptions()->get($option);
    }


}