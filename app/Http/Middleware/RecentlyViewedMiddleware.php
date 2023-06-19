<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecentlyViewedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route()->hasParameter('event')) {
            $eventId = $request->route('event.id');
            $recentlyViewed = session()->get('recently_viewed', []);

            if (in_array($eventId, $recentlyViewed)) {
                $recentlyViewed = array_values(array_diff($recentlyViewed, [$eventId]));
            }
            array_unshift($recentlyViewed, $eventId);

            $recentlyViewed = array_slice($recentlyViewed, 0, 5);

            session()->put('recently_viewed', $recentlyViewed);
        }

        return $next($request);
    }
}
