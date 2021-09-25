<?php

$this->include( 'panel.layout.header' );
?>
<form action="<?php $this->url('category/update/' . $category['id']) ?>" method="post">
  <section class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="<?php echo $category['name'] ?>">
  </section>
  <section class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="description ..." value="<?php echo $category['description'] ?>">
  </section>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php

$this->include( 'panel.layout.footer' );
?>
