<header>
    <nav class="flex-between">
        <div>
            <a class="link-menu" href="<?= $pathRedirect ?>./">Home</a>
        </div>

        <ul class="flex">
            <?php if ($sessionUser): ?>
                <?php if ($sessionAdmin): ?>
                    <li class="margin-right-li"><a class="link-menu" href="<?= $pathRedirect ?>admin">Admin</a></li>
                <?php endif; ?>
                <li class="margin-right-li"><a class="link-menu" href="<?= $pathRedirect ?>ships">Ships</a></li>
                <li class="margin-right-li"><a class="link-menu" href="<?= $pathRedirect ?>contacts">Contacts</a></li>
                <li><a class="link-menu" href="<?= $pathRedirect ?>users/logout">Logout</a></li>
            <?php else: ?>
                <li class="margin-right-li"><a class="link-menu" href="<?= $pathRedirect ?>users/register">Register</a></li>
                <li><a class="link-menu" href="<?= $pathRedirect ?>users/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>