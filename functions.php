<?php

function getAuthorImage($authorname)
{
    // Sanitize the author name to prevent directory traversal
    $authorname = basename($authorname);

    // Build the path to the author.md file
    $htmly_root = dirname(dirname(dirname(__FILE__)));
    $filePath = $htmly_root . '/content/' . $authorname . '/author.md';

    // Check if the file exists
    if (!file_exists($filePath)) {
        return '';
    }

    // Read the file content
    $content = file_get_contents($filePath);

    // Return empty if file couldn't be read
    if ($content === false) {
        return '';
    }

    // Use regex to find the image URL in the comment line
    // Pattern matches: <!--image <URL> image-->
    $pattern = '/<!--image\s+(https?:\/\/[^\s]+)\s+image-->/i';

    if (preg_match($pattern, $content, $matches)) {
        return $matches[1];
    }

    return '';
}


function getThumbnail($img)
{
    // normalize the file name from url, relative path
    $img_path = parse_url($img, PHP_URL_PATH);
    // $theme_path = parse_url(theme_path(), PHP_URL_PATH);

    $thumb_path = preg_replace(
        '/^(.*\/content\/.*\/)([^\/]+)(\.[^.]+)$/',
        '$1thumbnails/$2-500.webp',
        $img_path
    );

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $thumb_path)) {
        return $thumb_path;
    }

   return $img;
}


function processImageRows($html)
{
    // Trova tutti i div con classe image-row
    $pattern = '/<div class="image-row">(.*?)<\/div>/s';
    
    return preg_replace_callback($pattern, function($matches) {
        $content = $matches[1];
        
        // Trova tutti i tag img all'interno del div
        $imgPattern = '/<img\s+src="([^"]+)"([^>]*)>/i';
        
        $processedContent = preg_replace_callback($imgPattern, function($imgMatches) {
            $originalSrc = $imgMatches[1];
            $otherAttributes = $imgMatches[2];
            
            // Ottieni il thumbnail
            $thumbnailSrc = getThumbnail($originalSrc);
            
            // Se il thumbnail � diverso dall'originale, usa il thumbnail e salva l'originale
            if ($thumbnailSrc !== $originalSrc) {
                return '<img src="' . $thumbnailSrc . '" data-original="' . $originalSrc . '"' . $otherAttributes . '>';
            } else {
                // Se non c'� thumbnail, usa l'originale normalmente
                return '<img src="' . $originalSrc . '"' . $otherAttributes . '>';
            }
        }, $content);
        
        return '<div class="image-row">' . $processedContent . '</div>';
    }, $html);
}

?>