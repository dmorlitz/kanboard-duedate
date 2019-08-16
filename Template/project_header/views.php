<?php
//      $sort = $this->app->configModel->get('duedate_board_sort_method');

      $sort = $this->task->projectMetadataModel->get($project['id'], 'DueDate_Board_Sort_Method');

      if ($sort == null) {
         $sort = "duedate_board";
      }

      if ( $sort == "duedate_due") {
         $sorttext = "due date";
      } else {
         $sorttext = "board order";
      }

?>
<li <?= $this->app->checkMenuSelection('DueDateConfigController', 'show', 'DueDate') ?>>
    <?= $this->url->icon('sort', t('Sorted by ' . $sorttext), 'DueDateConfigController', 'show', array('plugin' => 'DueDate','project_id' => $project['id'])) ?></li>
</li>
