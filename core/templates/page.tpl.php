<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php print $data['title']; ?></title>
    <?php foreach ($data['css'] as $path): ?>
        <link rel="stylesheet" href="<?php print $path; ?>">
    <?php endforeach; ?>
    <?php foreach ($data['js'] as $path): ?>
        <script src="<?php print $path; ?>" defer></script>
    <?php endforeach; ?>

</head>
<body>
    <?php print $data['header']; ?>
    <main class="main">
        <?php print $data['content']; ?>
    </main>
    <footer class="footer">
        <?php print $data['footer']; ?>
    </footer>
</body>
</html>
