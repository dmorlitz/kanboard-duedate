<?php //var_dump($this->app->request);//$_SERVER['REQUEST_URI']);?>
<?php
//      $redirect = $this->app->request->getServerVariable("REQUEST_SCHEME") . "://" .
//                  $this->app->request->getServerVariable("SERVER_NAME") .
//                  $this->app->request->getUri();
      //Try setting redirect to path only - to auto-detect protocol
      $redirect = $this->app->request->getUri();
      $sort = $this->app->configModel->get('duedate_board_sort_method');
      if ( $sort == "duedate_due") {
         $sorttext = "due date";
      } else {
         $sorttext = "board order";
      }
?>
<?php //echo $this->app->request->getIntegerParam("project_id");?>
<li <?= $this->app->checkMenuSelection('DueDateController') ?>>
    <?= $this->url->link(t('Sorted by ' . $sorttext . ' (click to change)'), 'ConfigController', 'show', array('plugin' => 'DueDate', 'redirect' => urlencode($redirect) ) ); ?>
</li>
