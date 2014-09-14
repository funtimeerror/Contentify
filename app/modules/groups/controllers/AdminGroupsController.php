<?php namespace App\Modules\Groups\Controllers;

use App\Modules\Groups\Models\Group;
use Hover, BackController;

class AdminGroupsController extends BackController {

    protected $icon = 'lock.png';

    public function __construct()
    {
        $this->modelName = 'Group';

        parent::__construct();
    }

    public function index()
    {
        $this->indexPage([
            'tableHead' => [
                trans('app.id')     => 'id', 
                trans('app.title')  => 'name'
            ],
            'tableRow' => function($group)
            {
                return [
                    $group->id,
                    $group->name,
                ];            
            },
            'searchFor' => 'name'
        ]);
    }

}