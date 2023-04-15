<?php
header("Content-Type: text/plain;charset=UTF-8;");

$url = "http://" . $_SERVER['HTTP_HOST'];
echo "[playlist]\n";
echo "File1=" . $url . "/render/?q=http%3A//example.com/stream/index.m3u8&site=iptv\n";
echo "title1=Example\n";
echo "Length1=9999999\n";
echo "File2=" . $url . "/render/?q=http%3A//piratemoviesidk.net/TVorwhatever/index.m3u8&site=iptv\n";
echo "title2=Example 2\n";
echo "Length2=9999999\n";
?>
