<?php
// Set the new YouTube link
$youtube_link = 'https://www.youtube.com/watch?v=jfKfPfyJRdk';

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $youtube_link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Close cURL
curl_close($ch);

// Search for m3u8 file in response
if (preg_match('/(https?:\/\/.*\.m3u8)/', $response, $matches)) {
    // Found m3u8 file
    $m3u8_file = $matches[1];
    echo "Found m3u8 file: $m3u8_file\n";
} else {
    // Did not find m3u8 file
    echo "Did not find m3u8 file\n";
}
