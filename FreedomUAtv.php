<?php
// Replace YOUR_API_KEY with your actual API key
$apiKey = 'AIzaSyBpWyUjrr1eYicgkfHgx-L8Sjs0GROfVMk';
$videoId = 'ASndlvhI8p0';

// Set up the YouTube Data API client
$client = new Google_Client();
$client->setDeveloperKey($apiKey);
$service = new Google_Service_YouTube($client);

// Call the API to get the HLS URL for the live stream
$videosResponse = $service->videos->listVideos('liveStreamingDetails', array(
  'id' => $videoId,
));
$streamingDetails = $videosResponse[0]['liveStreamingDetails'];
$hlsUrl = $streamingDetails['hlsIngestionUrl'];

// Write out the M3U8 file
$m3u8Contents = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-MEDIA-SEQUENCE:0\n#EXT-X-TARGETDURATION:10\n#EXTINF:10.0,\n$hlsUrl\n";
file_put_contents('stream.m3u8', $m3u8Contents);

echo "M3U8 file created successfully.";
