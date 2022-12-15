<?php
namespace IvanoMatteo\LaravelDeviceTracking;

use Torann\GeoIP\Facades\GeoIP;

class GeoIpProvider implements GeoIpProviderInterface
{
    public function getCountry($ip) {
        return GeoIP::getLocation($ip)['country'];
    }

    public function getCountryIsoCode($ip) {
        return GeoIP::getLocation($ip)['iso_code'];
    }
    public function getCity($ip) {
        return GeoIP::getLocation($ip)['city'];
    }
    public function getState($ip) {
        return GeoIP::getLocation($ip)['state'];
    }
    public function getCoord($ip) {
        return GeoIP::getLocation($ip)['lat'];
    }
}
