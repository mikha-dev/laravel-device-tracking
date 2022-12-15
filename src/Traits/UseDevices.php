<?php

namespace IvanoMatteo\LaravelDeviceTracking\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use IvanoMatteo\LaravelDeviceTracking\Models\Device;
use IvanoMatteo\LaravelDeviceTracking\Models\DeviceUser;

trait UseDevices
{
    public function device() : BelongsToMany
    {
        return $this->belongsToMany(Device::class, DeviceUser::class)
            ->withPivot(['verified_at','name'])
            ->withTimestamps();
    }


    public function deviceShouldBeDetected() : bool
    {
        return true;
    }
}
