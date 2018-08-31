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
        <br>&nbsp<br><b>NOTE:</b> Any date format by PHP's strtotime function is accepted here
        <br>&nbsp&nbsp&nbspA value of 0 will force undated items to the top
        <br>&nbsp&nbsp&nbspA value significantly in the future will force undated items to the bottom (i.e. +90 years)
        <br>&nbsp&nbsp&nbspAny other date (i.e. 12/31/2019) or relative date (+75 days) will force undated items to that spot in the list
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
