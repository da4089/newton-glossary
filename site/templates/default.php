<?php if($page->description() != '') { $page_description = $page->description(); } else { $page_description = excerpt(kirbytext($page->text()), 300); } ?>

<?php snippet('header', array('title' => $page->title(), 'page_description' => $page_description)); ?>
<?php snippet('menu') ?>
<?php $page->isChildOf($pages->find('terms')) || $page->isChildOf($pages->find('sources')) ? snippet('prevnext') : '' ; ?>

<section class="content">
  <article>
    <h1><?php echo html($page->title()) ?></h1>
    <?php echo kirbytext($page->text()) ?>

	<?php $page->isChildOf($pages->find('terms')) || $page->isChildOf($pages->find('sources')) ? '' : snippet('submenu'); ?>
	
    <?php if($page->source()): ?>
        <?php foreach(related($page->source()) as $source): ?>
          <p><em>Source: <a href="<?php echo $source->url() ?>"><?php echo html($source->title()) ?></a></em></p>
        <?php endforeach ?>
    <?php endif ?>

    <?php if($page->related()): ?>
      <h2>Related Terms</h2>
      <ul>
        <?php foreach(related($page->related()) as $related): ?>
          <li><a href="<?php echo $related->url() ?>"><?php echo html($related->title()) ?></a></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

  </article>
</section>

<?php snippet('footer') ?>