<?php

namespace Skuads\LaravelGoogleMyBusiness\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleMyBusinessFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Skuads\LaravelGoogleMyBusiness\GoogleMyBusiness';
    }
}
