<?php

namespace Kanboard\Plugin\DueDate\Controller;
use Kanboard\Controller\BaseController;

class DueDateConfigController extends BaseController
{
    public function show(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $columnList =  $this->columnModel->getList($project['id']);
        $colorList =  $this->colorModel->getList($project['id']);
        $tagList =  $this->tagModel->getAll($project['id']);
        $this->response->html($this->helper->layout->project('DueDate:settings', array(
        //$this->response->html($this->helper->layout->project('project_edit/show', array(
            'owners' => $this->projectUserRoleModel->getAssignableUsersList($project['id'], true),
            'values' => array(
                'DueDate_Board_Sort_Method' => $this->projectMetadataModel->get($_REQUEST['project_id'], 'DueDate_Board_Sort_Method'),
                'DueDate_Board_Dividers' => $this->projectMetadataModel->get($_REQUEST['project_id'], 'DueDate_Board_Dividers'),
                'DueDate_Board_Default_Date' => $this->projectMetadataModel->get($_REQUEST['project_id'], 'DueDate_Board_Default_Date'),
                'DueDate_Board_Distant_Future' => $this->projectMetadataModel->get($_REQUEST['project_id'], 'DueDate_Board_Distant_Future'),
                'project_id' => $_REQUEST['project_id'],
                ),
            'errors' => $errors,
            'columns_list' => $columnList,
//            'destination' => $destinationColumn,
            'project' => $project,
            'title' => t('Edit project')
        )));

    }

//DMM: Original show function when done as a Settings panel
//    public function show(array $values = array(), array $errors = array())
//    {
//        $this->response->html($this->helper->layout->config('DueDate:board/duedate', array(
//            'title' => t('Settings').' &gt; '.t('Board due date settings'),
//        )));
//   }

    public function save()
    {
        $values =  $this->request->getValues();
        $errors = array();
        $project = $this->getProject();
        $columnList =  $this->columnModel->getList($project['id']);

        $this->projectMetadataModel->save($project['id'], array('DueDate_Board_Sort_Method' => $values["DueDate_Board_Sort_Method"]));
        $this->projectMetadataModel->save($project['id'], array('DueDate_Board_Dividers' => $values["DueDate_Board_Dividers"]));
        $this->projectMetadataModel->save($project['id'], array('DueDate_Board_Default_Date' => $values["DueDate_Board_Default_Date"]));
        $this->projectMetadataModel->save($project['id'], array('DueDate_Board_Distant_Future' => $values["DueDate_Board_Distant_Future"]));

//        $this->response->redirect($this->helper->url->to('BoardViewController', 'save', array('project_id' => $project['id'])), true);
        return $this->show($values, $errors);
    }
}
