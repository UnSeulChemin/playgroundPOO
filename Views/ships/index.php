<section class="section-content">

    <h2>Ships</h2>
   
    <section class="section-card">
        <?php foreach($ships as $ship): ?>
            <div class="div-card">
                <figure class="figure-card">
                    <a class="flex" href="<?= $pathRedirect; ?>ships/show/<?= $ship->id ?>">
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
<?php var_dump($_GET); ?>
    <nav class="flex-center margin-top">
        <?php for ($count = 1; $count <= $counts; $count++): ?>
            <a class="link-paginate" href="<?= $pathRedirect; ?>ships/page/<?php echo $count; ?>"><?php echo $count; ?></a>
        <?php endfor; ?>
    </nav>
</section>