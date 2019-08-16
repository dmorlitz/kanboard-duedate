<li <?= $this->app->checkMenuSelection('DueDateConfigController', 'show', 'DueDate') ?>>
    <?= $this->url->link(t('Due Date settings'), 'DueDateConfigController', 'show', array('plugin' => 'DueDate','project_id' => $project['id'])) ?>
</li>
