<?php

namespace Kanboard\Plugin\QwenTasks;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->applicationAccessMap->add('QwenTasks', '*', Role::APP_USER);
        $this->route->addRoute('qwen/tasks', 'QwenTasks', 'index', 'QwenTasks');
        $this->route->addRoute('qwen/tasks/create', 'QwenTasks', 'create', 'QwenTasks');
        $this->template->hook->attach('template:layout:top', 'QwenTasks:layout/top');
    }

    public function getPluginName()
    {
        return 'Qwen Tasks (Beta)';
    }

    public function getPluginDescription()
    {
        return 'Create Kanboard tasks from JSON copied from a Qwen chat without an API key.';
    }

    public function getPluginAuthor()
    {
        return 'QwenTasks contributors';
    }

    public function getPluginVersion()
    {
        return '0.1.0';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.50';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/qwe456876/kanboard';
    }
}
