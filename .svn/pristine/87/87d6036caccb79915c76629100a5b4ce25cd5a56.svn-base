<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AnObj extends stdClass {

    private $arrayFuncs = array(); // array of functions

    public function __call($closure, $args) {
        return call_user_func_array($this->{$closure}->bindTo($this), $args);
    }

    public function __toString() {
        return call_user_func($this->{"__toString"}->bindTo($this));
    }

    //
    public function addFunc($name, $function) {
        $this->arrayFuncs[$name] = $function;
    }

    //
    public function callFunc($namefunc, $params = false) {
        if (!isset($this->arrayFuncs[$namefunc])) {
            return 'no function exist';
        }
        if (is_callable($this->arrayFuncs[$namefunc])) {
            return call_user_func($this->arrayFuncs[$namefunc], $params);
        }
    }

}

?>