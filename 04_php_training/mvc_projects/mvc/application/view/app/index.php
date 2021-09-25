<?php

  $this->include('app.layout.header', compact('categories'));

?>
<section class="container my-5">
  <!-- Example row of columns -->
  <section class="row">
    <?php foreach ( $articles as $article ) : ?>
    <section class="col-md-4">
      <h2><?php echo $article['title']; ?></h2>
      <p>
        <?php
          $description_length = strlen($article['body']);
          echo mb_substr($article['body'], 0 , 50);
          echo $description_length > 50 ? '...' : '';
        ?>
      </p>
      <p><a class="btn btn-primary" href="<?php $this->url('home/show/'. $article['id']) ?>" role="button">View details »</a></p>
    </section>
    <?php endforeach; ?>
  </section>
</section>

<?php

$this->include('app.layout.footer');
?>

