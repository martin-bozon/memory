<nav>

</nav>

<div class="container">
    <?php
    if (Session::getInstance()->hasFlashes()): ?>
        <?php
        foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php
        endforeach; ?>
    <?php
    endif; ?>

</div>