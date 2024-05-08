<?php

namespace Noxyz20\LaravelWaze;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Waze
{

    public static function getWorkplaceRoute(array $from, array $to, $endTime = null): Collection
    {
        $response = Http::withHeaders([
            'accept' => '*/*',
            'accept-language' => 'fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7',
            'content-type' => 'application/json; charset=UTF-8',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'same-origin',
        ])->send('POST', 'https://www.waze.com/live-map/api/user-drive?geo_env=row', [
            'body' => json_encode(array_merge(self::getEndTime($endTime), [
                "from" => ["y" => $from['lat'], "x" => $from['lon']],
                "to" => ["y" => $to['lat'], "x" => $to['lon']],
                "nPaths" => 1,
                "useCase" => "LIVEMAP_PLANNING",
                "interval" => 15,
                "arriveAt" => true
            ]))]);

        return $response->collect();
    }

    private static function getEndTime($endTime = null): array
    {
        if ($endTime === null) {
            return [];
        }
        $currentTime = now()->startOfDay()->addSeconds(Carbon::parse($endTime)->secondsSinceMidnight());

        return ["endTime" => $currentTime->timestamp*1000];
    }
}