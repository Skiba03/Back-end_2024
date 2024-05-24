<?php
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = urlencode($_GET['search']);
    $apiKey = 'AIzaSyBzQcChRGPFoGFCEmEQphdTgbPriI_RKDE';
    $cx = 'a0a801075c4ac4689';

    $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    $results = json_decode($response, true);
    if (isset($results['items'])) {
        $items = $results['items'];
    } else {
        $items = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if (isset($items)) {
    echo "<ul>";
    foreach ($items as $item) {
        echo "<li><a href='{$item['link']}'>{$item['title']}</a><br>{$item['snippet']}</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>