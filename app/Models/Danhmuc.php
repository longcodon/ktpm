<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
     protected $table = 'danhmuc'; 
     // Trong migration
//      public function getValidYoutubeEmbedUrl()
// {
//     if (!$this->youtube_url) return null;
    
//     // Kiểm tra và chuẩn hóa URL
//     $url = $this->youtube_url;
//     if (str_contains($url, 'youtu.be')) {
//         $url = str_replace('youtu.be/', 'youtube.com/watch?v=', $url);
//     }
    
//     // Trích xuất ID video
//     preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)([^"&?\/\s]{11})/', $url, $matches);
    
//     return isset($matches[1]) ? 'https://www.youtube.com/embed/'.$matches[1] : null;
// }
}

