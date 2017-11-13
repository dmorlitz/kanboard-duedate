<li <?= $this->app->checkMenuSelection('ConfigController', 'show', 'DueDate') ?>>
    <?= $this->url->link(t('Board Due Date settings'), 'ConfigController', 'show', array('plugin' => 'DueDate')) ?>
</li>
