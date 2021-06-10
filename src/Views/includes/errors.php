<?php if (isset($_SESSION['errors'])) : ?>
    <div class="mb-6">
        <ul class="list-disc list-inside">
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                <li class="text-xs text-red-400"> <?php echo $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']) ?>
<?php endif ?>