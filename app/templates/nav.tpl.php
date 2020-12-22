<header class="header">
    <nav class="nav">
        <ul class="nav__list">
            <div class="nav__side">
                <?php foreach ($data['left'] as $link => $title): ?>
                    <li class="nav__item">
                        <a href="<?php print $link; ?>" class="nav__link<?php $link == $_SERVER['REQUEST_URI'] ?  print '  nav__link--active' : null ?>"><?php print $title; ?></a>
                    </li>
                <?php endforeach; ?>
            </div>
            <div class="nav__side">
                <?php foreach ($data['right'] as $link => $title): ?>
                    <li class="nav__item">
                        <a href="<?php print $link; ?>" class="nav__link<?php $link == $_SERVER['REQUEST_URI'] ?  print '  nav__link--active' : null ?>"><?php print $title; ?></a>
                    </li>
                <?php endforeach; ?>
            </div>
        </ul>
    </nav>
</header>
