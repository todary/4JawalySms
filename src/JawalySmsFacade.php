<?php

namespace BTM\JawalySms;


use Illuminate\Support\Facades\Facade;

class JawalySmsFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'JawalySms';
    }

}
