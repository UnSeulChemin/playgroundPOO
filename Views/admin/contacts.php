<section class="section-content">

    <h2>Contacts</h2>

    <?php foreach($contacts as $contact): ?>
        <article class="article-content">
            <div class="flex-center">
                <p class="bold"><?= $contact->title ?></p>
                <input type="checkbox" class="checkbox" id="<?= $contact->id ?>" <?= $contact->favorite == "Y" ? 'checked' : '' ?> data-id="<?= $contact->id ?>">
            </div>
            <div>
                <p><?= $contact->description ?></p>
            </div>
            <div>
                <p><?= date('d/m/Y', strtotime($contact->created_at)); ?></p>
            </div>
            <div>
                <a class="link-form" href="<?= $pathRedirect; ?>admin/contact/<?= $contact->id ?>">Preview</a>
            </div>
            <div>
                <a class="link-form" href="<?= $pathRedirect; ?>admin/updateContact/<?= $contact->id ?>">Update</a>
            </div>
            <div>
                <a class="link-form" href="<?= $pathRedirect; ?>admin/deleteContact/<?= $contact->id ?>">Delete</a>
            </div>
        </article>
    <?php endforeach; ?>

</section>