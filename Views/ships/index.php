<section class="section-content">

    <h2>Ships</h2>
   
    <section class="section-card">
        <?php foreach($ships as $ship): ?>
            <div class="div-card">
                <figure class="figure-card">
                    <a class="flex" href="<?= $pathRedirect; ?>ships/ship/<?= $ship->id ?>">
                        <img src="<?= $pathRedirect; ?>public/images/ships/<?= $ship->image.".".$ship->extension ?>">
                    </a>
                </figure>
                <div class="div-card-content">
                    <p class="margin-none"><?= $ship->name ?></p>
                </div>
                <div class="div-card-content">
                    <p class="margin-none"><?= date('d/m/Y', strtotime($ship->created_at)); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <nav class="flex-center margin-top">

        <?php
        $base = basename($_GET["p"]);
        if (!is_numeric($base)): $base = 1; endif; ?>

        <?php for ($count = 1; $count <= $counts; $count++): ?>
            <?php if ($base != $count): ?>
                <a class="link-paginate" href="<?= $pathRedirect; ?>ships/page/<?php echo $count; ?>"><?php echo $count; ?></a>
            <?php else: ?>
                <a class="link-paginate active"><?php echo $count; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

    </nav>

</section>