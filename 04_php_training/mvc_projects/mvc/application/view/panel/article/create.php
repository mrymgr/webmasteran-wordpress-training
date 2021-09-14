<?php

$this->include( 'panel.layout.header' );
?>
  <form>
    <section class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="title ...">
    </section>
    <section class="form-group">
      <label for="cat_id">Category</label>
      <select class="form-control" id="cat_id">
        <option value="1">Sport</option>
        <option value="2">News</option>
      </select>
    </section>
    <section class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" rows="5" placeholder="body ..."></textarea>
    </section>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>

<?php

$this->include( 'panel.layout.footer' );
?>