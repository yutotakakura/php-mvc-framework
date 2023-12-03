<?php
declare(strict_types=1);
?>

<form action="", method="post">
  <div class="mb-3">
    <label>Subject</label>
    <input type="text" name="subject" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label>Body</label>
    <textarea name="body" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>