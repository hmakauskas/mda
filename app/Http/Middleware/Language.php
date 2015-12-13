<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;

class Language implements Middleware {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Make sure current locale exists.
        if (array_key_exists($this->request->cookie('language'), $this->app->config->get('app.locales')))            
            $locale = $this->request->cookie('language');
        else
            $locale = $this->app->config->get('app.locale'); 

        $this->app->setLocale($locale);

        return $next($request);
    }

}