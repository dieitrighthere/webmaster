<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAFPNetwork
{
    public function handle(Request $request, Closure $next)
    {
        $isAFPNetwork = $this->isAFPNetwork($request->ip());
        
        // Add AFPNET status to all Inertia responses
        if ($request->header('X-Inertia')) {
            $request->session()->put('is_afp_network', $isAFPNetwork);
        }
        
        // Share with all Inertia responses
        app(\Inertia\Inertia::class)->share('isAFPNetwork', $isAFPNetwork);
        
        return $next($request);
    }

    protected function isAFPNetwork($ip)
    {
        // Method 1: Check for testing parameter (for development)
        if (request()->has('afpnet') && request()->get('afpnet') === 'true') {
            return true;
        }
        
        // Method 2: Check against AFPNET IP ranges (replace with actual ranges)
        $afpNetworkRanges = [
            // Add your actual AFPNET IP ranges here
            // Examples (replace with real ranges):
            // '192.168.1.0/24',    // Example internal range
            // '10.0.0.0/8',        // Example private range
            // '172.16.0.0/12',     // Example private range
        ];
        
        foreach ($afpNetworkRanges as $range) {
            if ($this->ipInRange($ip, $range)) {
                return true;
            }
        }
        
        // Method 3: Check for localhost/development (optional)
        if (app()->environment('local') && in_array($ip, ['127.0.0.1', '::1', 'localhost'])) {
            // For development, you can return true or false based on your needs
            return false; // Change to true if you want to test AFPNET features locally
        }
        
        return false;
    }

    protected function ipInRange($ip, $cidr) 
    {
        if (strpos($cidr, '/') === false) {
            return $ip === $cidr;
        }
        
        list($subnet, $mask) = explode('/', $cidr);
        
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) || 
            !filter_var($subnet, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return false;
        }
        
        $ipLong = ip2long($ip);
        $subnetLong = ip2long($subnet);
        $maskLong = -1 << (32 - (int)$mask);
        
        return ($ipLong & $maskLong) === ($subnetLong & $maskLong);
    }
}