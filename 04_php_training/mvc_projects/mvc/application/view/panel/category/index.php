<?php

$this->include( 'panel.layout.header' );
?>
<section class="mb-2 d-flex justify-content-between align-items-center">
  <h2 class="h4">Categories</h2>
  <a href="<?php $this->url( 'category/create' ); ?>" class="btn btn-sm btn-success">Create</a>
</section>

<section class="table-responsive">
  <table class="table table-striped table-">
    <thead>
    <tr>
      <th>#</th>
      <th>name</th>
      <th>description</th>
      <th>setting</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) : ?>
      <tr>
      <td><?php echo $category['id']; ?></td>
      <td><?php echo $category['name']; ?></td>
      <td><?php echo $category['description']; ?></td>
      <td>
        <a href="<?php $this->url('category/edit/'. $category['id']) ?>" class="btn btn-info btn-sm">Edit</a>
        <a href="<?php $this->url('category/destroy/'. $category['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>

<?php

$this->include( 'panel.layout.footer' );
?>

