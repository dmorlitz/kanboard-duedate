<div class="page-header">
    <h2><?= t('Board Due Date Sorting') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('ConfigController', 'save', array('plugin' => 'DueDate')) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <fieldset>
        <legend><?= t('Sort method') ?></legend>
        <?= $this->form->radios('duedate_board_sort_method', array(
                'duedate_board' => t('Show tasks in board order'),
                'duedate_due' => t('Show tasks in due date order'),
            ),
            $values
        ) ?>
    </fieldset>

    <fieldset>
        <legend><?= t('Due date assumed for tasks without due date') ?></legend>
        <?= $this->form->text('duedate_board_default_date', $values, $errors, array('required', 'autofocus', 'tabindex="2"')) ?>
        <br><b>NOTE:</b> Any date formated by strtotime is accepted here - a value of 0 will force undated items to the top
    </fieldset>

    <?php
       $redirect = urldecode($this->app->request->getStringParam('redirect'));
       if (empty($redirect)) {
          $redirect = "No redirection";
       }
    ?>
    <fieldset>
        <legend><?= t('Redirect you back to') ?></legend>
        <?= $this->form->hidden('redirect', array('redirect' => $redirect)); ?>
        <?php echo $redirect; ?>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>
