<?php

namespace Kanboard\Plugin\DueDate\Controller;

class ConfigController extends \Kanboard\Controller\ConfigController
{
    public function show()
    {
        $this->response->html($this->helper->layout->config('DueDate:config/duedate', array(
            'title' => t('Settings').' &gt; '.t('Board due date settings'),
        )));
    }

    public function save()
    {
        $values =  $this->request->getValues();
        if ($this->configModel->save($values)) {
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

       $redirect = urldecode($values['redirect']);
       if ( (empty($redirect)) || ($redirect == "No redirection") ) {
          $this->response->redirect($this->helper->url->to('ConfigController', 'show', array('plugin' => 'DueDate')));
       } else {
          $this->response->redirect($values['redirect']);
       }
    }
}
