<?php

namespace Kanboard\Plugin\DueDate;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach('template:project-header:view-switcher', 'DueDate:project_header/views');
        $this->template->setTemplateOverride('board/table_tasks', 'DueDate:board/table_tasks');
//        $this->template->hook->attach('template:project:dropdown', 'DueDate:board/dropdown');
        $this->template->hook->attach('template:project:sidebar', 'DueDate:board/sidebar');
    }

    public function getPluginName()
    {
        return 'DueDate';
    }

    public function getPluginDescription()
    {
        return t('Force columns to be sorted by due date');
    }

    public function getPluginAuthor()
    {
        return 'David Morlitz';
    }

    public function getPluginVersion()
    {
        return '1.1.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/dmorlitz/kanboard-duedate';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.41';
    }
}
