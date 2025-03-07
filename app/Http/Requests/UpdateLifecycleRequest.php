<?php

namespace App\Http\Requests;

class UpdateLifecycleRequest extends StoreLifecycleRequest
{
    public function rules()
    {
        return parent::rules();
    }
}
