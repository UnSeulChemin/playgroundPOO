<header>
    <nav class="flex-between">
        <div>
            <a class="link-menu" href="<?= test(); ?>./">Home</a>
        </div>

        <ul class="flex">
            <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"]["id"])): ?>
                <?php if (str_contains($_SESSION['user']['roles'], 'ROLE_ADMIN')): ?>
                    <li class="margin-right-li">
                        <a class="link-menu" href="admin">Admin</a>
                    </li>
                <?php endif; ?>
                <li class="margin-right-li"><a class="link-menu" href="<?= test(); ?>ships">Ships</a></li>
                <li class="margin-right-li"><a class="link-menu" href="<?= test(); ?>contacts">Contacts</a></li>
                <li><a class="link-menu" href="<?= test(); ?>users/logout">Logout</a></li>
            <?php else: ?>
                <li class="margin-right-li"><a class="link-menu" href="<?= test(); ?>users/register">Register</a></li>
                <li><a class="link-menu" href="<?= test(); ?>users/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>