<?php

$this->include( 'panel.layout.header' );
?>
<section class="mb-2 d-flex justify-content-between align-items-center">
  <h2 class="h4">Categories</h2>
  <a href="create.html" class="btn btn-sm btn-success">Create</a>
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
    <tr>
      <td>1</td>
      <td>Sport</td>
      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
      <td>
        <a href="edit.html" class="btn btn-info btn-sm">Edit</a>
        <a href="#" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>News</td>
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

