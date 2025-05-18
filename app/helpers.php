<?php

use Illuminate\Support\Str;

if (!function_exists('getYoutubeThumbnail')) {
    function getYoutubeThumbnail($url)
    {
        $videoId = extractYoutubeId($url);
        return $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : asset('images/default-thumbnail.jpg');
    }
}

if (!function_exists('extractYoutubeId')) {
    function extractYoutubeId($url)
    {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/([^"&?\/\s]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }
}