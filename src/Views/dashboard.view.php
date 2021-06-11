<?php includes('header') ?>

<div>
  <h2>Welcome</h2>
</div>

<div>
  <?php includes('errors') ?>
  <!-- RESET PASSWORD -->
  <a href="/php-auth/password/<?php echo $_SESSION['auth'] ?>/reset">reset password</a>
</div>

<div>
  <!-- LOGOUT -->
  <button onclick="document.querySelector('#logout').submit()">Logout</button>
  <form id="logout" action="/php-auth/logout/1" method="POST">
    <?php echo method_field('DELETE') ?>
    <?php echo csrf_field() ?>
    
  </form>
  <?php includes('footer') ?>
</div>