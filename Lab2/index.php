<!DOCTYPE html>
<html>

<head>
    <title>Điểm tin mới</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="container">
        <div class="btn-group" role="group" aria-label="news reader">
            <form method="POST">
                <button type="submit" class="btn btn-outline-primary me-1" name="tin-moi-nhat">Tin mới nhất</button>
                <button type="submit" class="btn btn-outline-primary me-1" name="tin-noi-bat">Tin nổi bật</button>
                <button type="submit" class="btn btn-outline-primary me-1" name="the-gioi">Thế giới</button>
                <button type="submit" class="btn btn-outline-primary me-1" name="thoi-su">Thời sự</button>
                <button type="submit" class="btn btn-outline-primary me-1" name="giai-tri">Giải trí</button>
                <button type="submit" class="btn btn-outline-primary me-1" name="so-hoa">Số hóa</button>
            </form>
        </div>
        <div class="wrapper">
            <div class="feed_div">
                <?php
                $url = 'https://vnexpress.net/rss/';
                $max_item = 10;

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (array_key_exists('tin-moi-nhat', $_POST))
                        $rss = 'tin-moi-nhat.rss';
                    else if (array_key_exists('tin-noi-bat', $_POST))
                        $rss = 'tin-noi-bat.rss';
                    else if (array_key_exists('the-gioi', $_POST))
                        $rss = 'the-gioi.rss';
                    else if (array_key_exists('thoi-su', $_POST))
                        $rss = 'thoi-su.rss';
                    else if (array_key_exists('giai-tri', $_POST))
                        $rss = 'giai-tri.rss';
                    else if (array_key_exists('so-hoa', $_POST))
                        $rss = 'so-hoa.rss';
                    else
                        die('Không hợp lệ!');

                    $url = $url . $rss;
                    $rss = simplexml_load_file($url);
                    echo '<h2>' . $rss->channel->title . '</h2>';
                    $i = 0;
                    foreach ($rss->channel->item as $item) {
                        $i++;
                        if ($i > $max_item - 1)
                            break;
                        echo '<p class="title"><a href="' . $item->link . '">' . $item->title . "</a></p>";
                        echo '<p class="desc">' . $item->description . "</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>