<form method="post" action="">
    <input type="text" name="feedurl" placeholder="Nhập url có chứa rss" />
    <input type="submit" name="submit" value="Lấy tin" />
</form>

<?php

$url = 'https://vnexpress.net/rss/tin-moi-nhat.rss';
if (isset($_POST['submit'])) {
    if ($_POST['feedurl'] != '') {
        $url = $_POST['feedurl'];
    }
}
$invalidurl = false;
if (@simplexml_load_file($url)) {
    $feeds = simplexml_load_file($url);
} else {
    $invalidurl = true;
    echo "<h2>Invalid RSS feed URL</h2>";
}

$i = 0;
if (!empty($feeds)) {
    $site = $feeds->channel->title;
    echo "<h1>" . $site . "</h1>";

    foreach ($feeds->channel->item as $item) {
        $title = $item->title;
        $link = $item->link;
        $description = $item->description;
        $postdate = $item->pubDate;
        $pubDate = date('D, d M Y', strtotime($postdate));
        if ($i > 5)
            break;
?>
        <div class="post">
            <div class="post-head">
                <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                <span><?php echo $pubDate; ?></span>
            </div>
            <div class="post-content">
                <?php echo implode(" ", array_slice(explode(' ', $description), 0, 20)); ?>
            </div>
        </div>
<?php
        $i++;
    }
} else {
    if (!$invalidurl) {
        echo "<h2>No item found.</h2>";
    }
}
?>