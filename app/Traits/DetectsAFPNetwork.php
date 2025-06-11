<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait DetectsAFPNetwork
{
    /**
     * Check if the current request is from AFPNET
     */
    protected function checkAFPNetwork(Request $request): bool
    {
        // Method 1: URL parameter for testing
        if ($request->has('afpnet') && $request->get('afpnet') === 'true') {
            return true;
        }
        
        // Method 2: Check IP ranges (add your actual ranges here)
        $afpNetworkRanges = config('app.afpnet_ranges', [
            // Default ranges - override in config/app.php
            // '192.168.1.0/24',  // Add real AFPNET ranges
            // '10.0.0.0/8',      // Add real AFPNET ranges
        ]);
        
        $clientIP = $request->ip();
        foreach ($afpNetworkRanges as $range) {
            if ($this->ipInRange($clientIP, $range)) {
                return true;
            }
        }
        
        // Method 3: Check environment variable for development
        if (app()->environment('local') && env('FORCE_AFPNET', false)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Check if an IP address is within a CIDR range
     */
    protected function ipInRange(string $ip, string $cidr): bool 
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
    
    /**
     * Get AFPNET status for Inertia responses
     */
    protected function getAFPNetworkStatus(Request $request): array
    {
        $isAFPNetwork = $this->checkAFPNetwork($request);
        
        return [
            'isAFPNetwork' => $isAFPNetwork,
        ];
    }
}