<?php
// Get the content of the M3U8 playlist file
$m3u8Url = 'https://live-k2303-kbp.1plus1.video/live/1678717297/8BwfhuaWn-MuLhxXPjUtUQ/189931/smil:189931.smil/chunklist_b6328000.m3u8';
$m3u8Content = file_get_contents($m3u8Url);

// Extract the URL of the first video segment
$segmentUrls = explode("\n", $m3u8Content);
$firstSegmentUrl = trim($segmentUrls[2]);

// Output the video segment URL (you can use this URL to play the video)
echo $firstSegmentUrl;
?>
