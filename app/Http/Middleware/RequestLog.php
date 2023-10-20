<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class RequestLog
{
    public function handle(Request $request, Closure $next): Response
    {
        //kod przed
        $currentDate = Carbon::now();
        $timeStart = microtime(true);

        Log::info('======================================');
        Log::info($currentDate . ': BEFORE: '. $timeStart);

        $response = $next($request);
        //kod po

        $timeEnd = microtime(true);

        Log::info($currentDate . ': AFTER: '. $timeEnd);
        Log::info($currentDate . ': RESULT: '. $timeEnd - $timeStart);
        return $next($request);
    }
}
