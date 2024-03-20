<section class="section-content">

    <h2>Ships</h2>
   
    <section class="section-card">
        <?php foreach($ships as $ship): ?>
            <div class="div-card">
                <figure class="figure-card">
                    <a class="flex" href="ships/show/<?= $ship->id ?>">
                        <img src="public/images/ships/<?= $ship->image.".".$ship->extension ?>">
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
        <?php for ($count = 1; $count <= $counts; $count++): ?>

            <?php if (!isset($getId)): $getId = 1; endif;

            if ($getId != $count):
                if (isset($_GET["id"]) && !empty($_GET["id"])): ?>
                    <a class="link-paginate" href="../page/<?php echo $count; ?>"><?php echo $count; ?></a>               
                <?php else: ?>
                    <a class="link-paginate" href="ships/page/<?php echo $count; ?>"><?php echo $count; ?></a>
                <?php endif; ?>
            <?php else: ?>
                <a class="link-paginate active"><?php echo $count; ?></a>
            <?php endif; ?>

        <?php endfor; ?>
    </nav>
</section>