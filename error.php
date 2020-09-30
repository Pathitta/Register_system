<!--check error and loop to show error-->
<?php $errors = array() ?>

<?php if (count($errors) >0 ) : ?>
    <div class="error">
          <?php foreach ($errors as $error) : ?>
              <p><?php echo $error ?></p>
          <?php endforeach ?>    
    </div>
<?php endif ?>