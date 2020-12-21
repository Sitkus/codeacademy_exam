<header class="header">
    <nav class="nav">
        <ul class="nav__list">
            <?php foreach ($data as $title => $link): ?>
                <li class="nav__item"><a href="<?php print $title; ?>" class="nav__link"><?php print $link; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
