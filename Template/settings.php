<div class="page-header">
    <h2><?= t('Board Due Date Sorting') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('DueDateConfigController', 'save', array('plugin' => 'DueDate','project_id' => $_REQUEST['project_id'])) ?>" autocomplete="off">

<?php
//   $duedate_board_dividers = $this->task->projectMetadataModel->get($_REQUEST['project_id'], "DueDate_Board_Dividers");
//   $duedate_board_sort_method = $this->task->projectMetadataModel->get($_REQUEST['project_id'], "DueDate_Board_Sort_Method");
//   $duedate_board_default_date = $this->task->projectMetadataModel->get($_REQUEST['project_id'], "DueDate_Board_Default_Date");
?>

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>
    <fieldset>
        <legend><?= t('Sort method') ?></legend>
        <?= $this->form->radios('DueDate_Board_Sort_Method', array(
                'duedate_due' => t('Show tasks in due date order'),
                'duedate_modified' => t('Show tasks in modification order - unmodified longest at the top'),
                'duedate_board' => t('Show tasks in board order'),
            ),
            $values
        ) ?>
    </fieldset>

    <fieldset>
        <legend><?= t('Overdue/Future dividers - ONLY used when sorted by Due Date') ?></legend>
        <?= $this->form->radios('DueDate_Board_Dividers', array(
                'duedate_board_dividers_on' => t('On - show overdue/future dividers'),
                'duedate_board_dividers_off' => t('Off'),
            ),
            $values
        ) ?>
        <br><?= t('NOTE: This setting only takes effect when sorting is done by due date order') ?>
    </fieldset>

    <fieldset>
        <legend><?= t('Number of days for "distant" separator line (numbers only)') ?></legend>
        <?= $this->form->text('DueDate_Board_Distant_Future', $values, $errors, array('required', 'autofocus', 'tabindex="2"')) ?>
    </fieldset>

    <fieldset>
        <legend><?= t('Date assumed for tasks without due date') ?></legend>
        <?= $this->form->text('DueDate_Board_Default_Date', $values, $errors, array('required', 'autofocus', 'tabindex="2"')) ?>
        <br/><?= 
            t('NOTE: Any date format by PHP\'s strtotime function is accepted here'),
            nl2br ("\n"),
            t('A value of 0 will force undated items to the top'),
            nl2br ("\n"),
            t('A value significantly in the future will force undated items to the bottom (i.e. +90 years)'),
            nl2br ("\n"),
            t('Any other date (i.e. 12/31/2019) or relative date (+75 days) will force undated items to that spot in the list') ?>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>
