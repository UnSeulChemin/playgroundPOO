<?php $title = "| Register"; ?>
<section class="section-content">

    <h2>Register</h2>

    <?php if (isset($message)): ?>
        <div class="warning-flash">
            <p><?= $message; unset($message); ?></p>
        </div>
    <?php endif; ?>

    <form method="post">
        <div>
            <input type="text" name="username" placeholder="Username" autofocus>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="link-form" type="submit">Register</button>
    </form>

</section>