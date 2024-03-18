<section class="section-content">

    <h2>PlaygroundPOO</h2>

    <?php if (isset($_COOKIE["404"]) && !empty($_COOKIE['404'])): ?>
        <div class="warning-flash">
            <p><?= htmlspecialchars($_COOKIE["404"]); setcookie("404", "", time()-3600); unset($_COOKIE["404"]); ?></p>
        </div>
    <?php endif; ?>
   
    <div class="div-content">
        <p>What's news?</p>
        <p>Register for free and see all news.</p>
    </div>

</section>