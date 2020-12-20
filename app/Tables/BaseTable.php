<?php

namespace App\Tables;

use Okipa\LaravelTable\Table;

abstract class BaseTable
{
    public static $classes = [
        'approved' => 'badge-success',
        'unapproved' => 'badge-warning',
        'inactive' => 'badge-secondary',
        'suspended' => 'badge-danger'
    ];

    public static $boolean = [
        1 => "<i class='fas fa-check-circle text-primary'></i>",
        0 => "<i class='fas fa-times-circle text-danger'></i>"
    ];

    abstract protected function columns(Table $table);

    abstract protected function table();

    public function setup()
    {
        return $this->columns($this->table());
    }

    protected function statusColumn($status)
    {
        $classes = self::$classes;

        return "<span class='badge badge-pill $classes[$status]'>" . ucfirst($status). "</span>";
    }

    protected function booleanColumn($value)
    {
        $icon = $value ?
            "<i class='fas fa-check-circle text-primary font-size-lg'></i>" :
            "<i class='fas fa-times-circle font-size-lg text-danger'></i>";

        return "<div class='text-center'>$icon</div>";
    }

    protected function actionColumns($actions)
    {
        $actionsHtml = "";
        foreach ($actions as $action) {

            $dataAttrs = "";
            foreach ($action['data'] as $attrName => $attrValue) {
                $dataAttrs = $dataAttrs . "data-$attrName='$attrValue' ";
            }

            if ($action['visible']) {
                $actionsHtml = $actionsHtml .
                    "<a class='dropdown-item table-action {$action['classes']}'
                        id='{$action['id']}' href='{$action['url']}' {$dataAttrs}>
                        {$action['label']}
                    </a>";
            }
        }

        return "<div class='dropdown'>
                      <button class='btn btn-light font-size-nm' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Actions
                      </button>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        $actionsHtml
                      </div>
                 </div>";
    }
}
