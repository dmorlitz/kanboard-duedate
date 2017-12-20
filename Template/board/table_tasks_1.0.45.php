<!-- task row -->
<tr class="board-swimlane board-swimlane-tasks-<?= $swimlane['id'] ?>">
    <?php foreach ($swimlane['columns'] as $column): ?>
        <td class="
            board-column-<?= $column['id'] ?>
            <?= $column['task_limit'] > 0 && $column['nb_tasks'] > $column['task_limit'] ? 'board-task-list-limit' : '' ?>
            "
        >

            <!-- tasks list -->
            <div
                class="board-task-list board-column-expanded <?= $this->projectRole->isSortableColumn($column['project_id'], $column['id']) ? 'sortable-column' : '' ?>"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">
                <?php
                /* DMM: BEGIN This sorts the tasks in a column by due date */
                    //echo "<pre>";var_dump($column['tasks']);echo "</pre>";
                    if ($this->app->configModel->get('duedate_board_sort_method') == "duedate_due") {
                       //echo "Sorted by due date";
                       uasort($column['tasks'], function($a, $b) {
                          $datea=0;
                          $dateb=0;
                          if ( !empty($a['date_due']) ) {
                             $datea=$a['date_due'];
                          }
                          if ( !empty($b['date_due']) ) {
                             $dateb=$b['date_due'];
                          }
                          if ($datea<=$dateb) {
                             $ret=-1;
                          } else {
                             $ret=1;
                          }
                         return $ret;
                       }
                   );
                }
                /* DMM: END This sorts the tasks in a column by due date */
                ?>
                <?php foreach ($column['tasks'] as $task): ?>
                    <?= $this->render($not_editable ? 'board/task_public' : 'board/task_private', array(
                        'project' => $project,
                        'task' => $task,
                        'board_highlight_period' => $board_highlight_period,
                        'not_editable' => $not_editable,
                    )) ?>
                <?php endforeach ?>
            </div>

            <!-- column in collapsed mode (rotated text) -->
            <div class="board-column-collapsed">
                <div class="board-rotation-wrapper">
                    <div class="board-column-title board-rotation board-toggle-column-view" data-column-id="<?= $column['id'] ?>" title="<?= t('Show this column') ?>">
                        <i class="fa fa-plus-square tooltip" title="<?= $this->text->e($column['title']) ?>"></i> <?= $this->text->e($column['title']) ?>
                    </div>
                </div>
            </div>
        </td>
    <?php endforeach ?>
</tr>
