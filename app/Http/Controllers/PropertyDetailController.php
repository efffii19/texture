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
        $property = Property::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $sanitizedMapIframe = $this->sanitizeMapIframe($property->map_iframe);

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

        if (!str_contains($iframe, '<iframe')) {
            return $this->validateIframeSrc($iframe) ? '<iframe src="' . e($iframe) . '" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>' : null;
        }

        preg_match('/src=["\']([^"\']+)["\']/', $iframe, $matches);
        if (!isset($matches[1])) {
            return null;
        }
        $src = $matches[1];

        if ($this->validateIframeSrc($src)) {
            return $iframe;
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
