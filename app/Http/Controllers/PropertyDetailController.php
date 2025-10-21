<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyDetailController extends Controller
{
    /**
     * Display the detailed page for a single property.
     */
    public function show($slug)
    {
        // Find by slug, but only published properties should be visible publicly
        $property = Property::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Sanitize map iframe to prevent XSS
        $sanitizedMapIframe = $this->sanitizeMapIframe($property->map_iframe);

        // Get recommended properties based on smart matching
        $recommendedProperties = $property->getRecommendedProperties(6);

        return view('pages.detail', compact('property', 'recommendedProperties', 'sanitizedMapIframe'));
    }

    /**
     * Sanitize map iframe by validating src against allowed domains.
     */
    private function sanitizeMapIframe($iframe)
    {
        if (empty($iframe)) {
            return null;
        }

        // Check if it contains iframe tag
        if (!str_contains($iframe, '<iframe')) {
            // If it's just a URL, treat as src
            return $this->validateIframeSrc($iframe) ? '<iframe src="' . e($iframe) . '" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>' : null;
        }

        // Extract src from iframe
        preg_match('/src=["\']([^"\']+)["\']/', $iframe, $matches);
        if (!isset($matches[1])) {
            return null;
        }
        $src = $matches[1];

        if ($this->validateIframeSrc($src)) {
            return $iframe; // Return original if valid
        }

        return null;
    }

    /**
     * Validate iframe src URL against whitelist.
     */
    private function validateIframeSrc($src)
    {
        $allowedDomains = ['maps.google.com', 'www.google.com'];

        $parsed = parse_url($src);
        if (!$parsed || !isset($parsed['host'])) {
            return false;
        }

        $host = $parsed['host'];
        foreach ($allowedDomains as $domain) {
            if (str_ends_with($host, $domain)) {
                return true;
            }
        }

        return false;
    }
}
