<header>
    <nav class="flex-between">
        <div>
            <a class="link-menu" href="<?= test(); ?>./">Home</a>
        </div>

        <ul class="flex">
            <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"]["id"])): ?>
                <li class="margin-right-li"><a class="link-menu" href="<?= test(); ?>users/logout">Logout</a></li>
            <?php else: ?>
                <li class="margin-right-li"><a class="link-menu" href="<?= test(); ?>users/register">Register</a></li>
                <li><a class="link-menu" href="<?= test(); ?>users/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>