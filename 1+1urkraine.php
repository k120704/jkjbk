<?php
// Get the HTML content of the webpage
$html = file_get_contents('https://1plus1.video/tvguide/1plus1ukr/online');

// Create a new DOMDocument object and load the HTML content
$dom = new DOMDocument();
$dom->loadHTML($html);

// Use XPath to find the video element by its class or ID attribute
$xpath = new DOMXPath($dom);
$videoElement = $xpath->query("//video[@class='jw-video jw-reset']")->item(0);

// Retrieve the source URL of the video element
$videoUrl = $videoElement->getAttribute('src');

// Output the video URL
echo $videoUrl;
?>
