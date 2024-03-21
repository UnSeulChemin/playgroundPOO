<section class="section-content">

    <h2>Contact <?= $contact->id ?></h2>
   
    <article class="article-content">
        <p class="bold"><?= $contact->title ?></p>
        <p><?= $contact->description ?></p>
        <p><?= date('d/m/Y', strtotime($contact->created_at)); ?></p>
        <a class="link-form" href="javascript:history.go(-1)">Back</a>
    </article>

</section>