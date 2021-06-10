<?php includes('header') ?>

<div class="w-1/3 p-6 mx-auto bg-white shadow rounded">
  <!-- LABEL -->
  <h2 class="mb-6 text-xl font-bold text-blue-400 text-center">Register</h2>

  <!-- ERROR FEEDBACK -->
  <?php includes('errors') ?>

  <form action="/php-auth/register" method="POST">
    <!-- USERNAME -->
    <div class="mb-6">
      <label for="Email" class="block mb-1 text-sm font-bold text-gray-500">Email</label>
      <input type="text" name="email" placeholder="Email..." id="Email" class="w-full p-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
    </div>
    <!-- PASSWORD -->
    <div class="mb-6">
      <label for="Password" class="block mb-1 text-sm font-bold text-gray-500">Password</label>
      <input type="text" name="password" placeholder="Password..." id="Password" class="w-full p-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
    </div>
    <!-- CONFIRM PASSWORD -->
    <div class="mb-6">
      <label for="password_confirmation" class="block mb-1 text-sm font-bold text-gray-500">Confirm password</label>
      <input type="text" name="password_confirmation" placeholder="confirm password..." id="password_confirmation" class="w-full p-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
    </div>
    <!-- SUBMIT -->
    <div class="mb-6">
      <button class="w-full py-2 px-3 text-white bg-blue-400 rounded hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">Register</button>
    </div>
  </form>
</div>

<?php includes('footer') ?>