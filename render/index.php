<?php
if ($_REQUEST['site'] == "iptv") {
    $video_url = urldecode($_REQUEST['q']);
} else {
    $video_url = "";
}

header("Content-Type:application/octet-stream");

if (!empty($video_url)) {
    $cmd = "ffmpeg -i " . escapeshellarg($video_url) . " -movflags frag_keyframe+empty_moov -f ismv -bsf:a aac_adtstoasc -vf scale=640:480 -";
} else {
    echo "Invalid request.";
    exit();
}

flush();
$handle = popen($cmd, "r");
while (!feof($handle)) {
    echo fread($handle, 8192);
    flush();
}
pclose($handle);
?>

