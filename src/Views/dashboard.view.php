<?php includes('header') ?>

<div>
  <h2>Welcome</h2>
</div>

<!-- LOGOUT -->
<button onclick="document.querySelector('#logout').submit()">Logout</button>
<form id="logout" action="/php-auth/logout/1" method="POST">
  <?php echo method_field('DELETE') ?>
</form>
<?php includes('footer') ?>