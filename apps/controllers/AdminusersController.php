<?php
/**
 * Phanbook : Delightfully simple forum software
 *
 * Licensed under The GNU License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link    http://phanbook.com Phanbook Project
 * @since   1.0.0
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */
namespace Phanbook\Controllers;

use Phanbook\Models\Users;

/**
 * Class IndexController
 */
class AdminusersController extends ControllerAdminBase
{
    /**
     * Initiate grid
     */
    protected static function setGrid()
    {
        parent::$grid = [
            'grid' =>
                [
                    'id'      => [
                        'title'  => 'Id',
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'int', 'style' => 'width: 60px;']
                    ],
                    'name'   => [
                        'title'  => t('Name'),
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'string', 'style' => ''],
                    ],
                    'username'    => [
                        'title'  => t('Username'),
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'string', 'style' => ''],
                    ],
                    'email' => [
                        'title'  => t('Email'),
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'string', 'style' => ''],
                    ],
                    'moderator' => [
                        'title'  => t('Moderator'),
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'string', 'style' => 'width:100px'],
                    ],
                    'admin' => [
                        'title'  => t('Admin'),
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'string', 'style' => 'width:100px'],
                    ],
                    'karma' => [
                        'title'  => t('Karma'),
                        'order'  => true,
                        'filter' => ['type' => 'input', 'sanitize' => 'string', 'style' => 'width:100px'],
                    ],
                    'status' => [
                        'title'  => t('Status'),
                        'order'  => true,
                        'filter' => [
                            'type'     => 'select',
                            'sanitize' => 'int',
                            'using'    => null,
                            'values'   => Users::getStatusesWithLabels(),
                            'style'    => 'width: 100px;'
                        ]
                    ],
                    'gender' => [
                        'title'  => t('Gender'),
                        'order'  => true,
                        'filter' => [
                            'type'     => 'select',
                            'sanitize' => 'int',
                            'using'    => null,
                            'values'   => Users::getGendersWithLabels(),
                            'style'    => 'width: 100px;'
                        ]
                    ],
                    'null'    => ['title' => t('Actions')]
                ],
                'query' => [
                'columns' => [
                    'a.id',
                    "CONCAT(a.firstname, ' ', a.lastname) as name ",
                    'a.username',
                    'a.gender',
                    'a.email',
                    'a.status',
                    'a.admin',
                    'a.moderator',
                    'a.karma',
                ],
                'joins'   => [],
                'groupBy' => 'a.id'
                ]
                /*'actions' => [
                'delete'  => ['title' => 'Delete selected', 'class' => 'btn btn-sm btn-danger'],
                'disable' => ['title' => 'Disable selected', 'class' => 'btn btn-sm btn-warning']
                ]*/
        ];
    }

    /**
     * indexAction function.
     *
     * @return void
     */
    public function indexAction()
    {
        if (empty(parent::$grid)) {
            self::setGrid();
        }

        $this->renderGrid('Phanbook\Models\Users');
        $this->view->setVars(['grid' => parent::$grid]);
        $this->tag->setTitle(t('Lists all users'));

        if ($this->request->isAjax()) {
            $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            $this->view->pick('partials/admin-grid');
        }
    }
    public function newAction()
    {
        //@todo
        $this->flashSession->notice('Todo later');
        $this->currentRedirect();
    }

    public function editAction($id)
    {
        //@todo
        $this->flashSession->notice('Todo later');
        $this->currentRedirect();
    }
}
