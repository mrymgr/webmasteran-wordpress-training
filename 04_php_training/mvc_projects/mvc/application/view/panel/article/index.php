<?php

$this->include( 'panel.layout.header' );
?>
<section class="mb-2 d-flex justify-content-between align-items-center">
  <h2 class="h4">Articles</h2>
  <a href="create.html" class="btn btn-sm btn-success">Create</a>
</section>

<section class="table-responsive">
  <table class="table table-striped table-">
    <thead>
    <tr>
      <th>#</th>
      <th>title</th>
      <th>cat_id</th>
      <th>body</th>
      <th>setting</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>1</td>
      <td>Sport vs Smoke</td>
      <td>1</td>
      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
      <td>
        <a href="edit.html" class="btn btn-info btn-sm">Edit</a>
        <a href="#" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>global warming</td>
      <td>2</td>
      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
      <td>
        <a href="edit.html" class="btn btn-info btn-sm">Edit</a>
        <a href="#" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    </tbody>
  </table>
</section>

<?php

$this->include( 'panel.layout.footer' );
?>

