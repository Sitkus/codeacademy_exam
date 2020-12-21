<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php print $data['title']; ?></title>
    <?php foreach ($data['css'] as $path): ?>
        <link rel="stylesheet" href="<?php print $path; ?>">
    <?php endforeach; ?>
    <?php foreach ($data['js'] as $path): ?>
        <script src="<?php print $path; ?>" defer></script>
    <?php endforeach; ?>

</head>
<body class="index__body">
    <?php print $data['header']; ?>
    <main class="main">
        <?php print $data['content']; ?>
    </main>
    <footer class="footer">
        <?php print $data['footer']; ?>
    </footer>
</body>
</html>
