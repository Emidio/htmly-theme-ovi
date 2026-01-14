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

?>