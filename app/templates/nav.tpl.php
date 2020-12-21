<header class="header">
    <nav class="nav">
        <ul class="nav__list">
            <div class="nav__side">
                <?php foreach ($data['left'] as $title => $link): ?>
                    <li class="nav__item">
                        <a href="<?php print $title; ?>" class="nav__link"><?php print $link; ?></a>
                    </li>
                <?php endforeach; ?>
            </div>
            <div class="nav__side">
                <?php foreach ($data['right'] as $title => $link): ?>
                    <li class="nav__item">
                        <a href="<?php print $title; ?>" class="nav__link"><?php print $link; ?></a>
                    </li>
                <?php endforeach; ?>
            </div>
        </ul>
    </nav>
</header>
