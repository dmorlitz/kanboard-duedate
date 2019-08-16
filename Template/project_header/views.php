<?php
//      $sort = $this->app->configModel->get('duedate_board_sort_method');

      $sort = $this->task->projectMetadataModel->get($project['id'], 'DueDate_Board_Sort_Method');
      $dividers = $this->task->projectMetadataModel->get($project['id'], 'DueDate_Board_Dividers');

      if ($sort == null) {
         $sort = "duedate_board";
      }

      if ($dividers == null) {
         $dividers = "duedate_board_dividers_off";
      }

      if ( $sort == "duedate_due") {
         $sorttext = "due date";
      } else {
         $sorttext = "board order";
      }

      if ( $dividers == "duedate_board_dividers_on") {
         $dividertext = " / Dividers on";
      } else {
         $dividertext = " / Dividers off";
      }

?>
<li <?= $this->app->checkMenuSelection('DueDateConfigController', 'show', 'DueDate') ?>>
    <?= $this->url->icon('sort', t('Sorted by ' . $sorttext . $dividertext), 'DueDateConfigController', 'show', array('plugin' => 'DueDate','project_id' => $project['id'])) ?></li>
</li>
