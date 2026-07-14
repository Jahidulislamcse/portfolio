<?php

namespace App\Services;

use App\Models\Setting;

class ContactService
{

    public function getContactData(): array
    {
        $settings = Setting::first();

        return compact('settings');
    }
}
