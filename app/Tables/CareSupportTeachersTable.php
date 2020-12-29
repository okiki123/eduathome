<?php

namespace App\Tables;

use App\Constants\Status;
use App\Models\Caregiver;
use Illuminate\Database\Eloquent\Builder;
use Okipa\LaravelTable\Table;

class CareSupportTeachersTable extends BaseTable
{
    protected function table(): Table
    {
        return (new Table())->model(Caregiver::class)
            ->routes([
                'index' => ['name' => 'admin.care-support-teachers']
            ])
            ->query(function (Builder $query) {
                $query->select(
                    'caregivers.*', 'users.firstname as firstname', 'users.lastname as lastname',
                    'users.email as email'
                );
                $query->leftJoin('users', 'users.id', '=', 'caregivers.user_id');
                $query->orderByDesc('caregivers.created_at');
            });
    }

    protected function columns(Table $table): Table
    {
        $table->column('firstname')->title('FirstName');

        $table->column('lastname')->title('LastName');

        $table->column('email')->title('Email')->searchable('users', ['email']);

        $table->column('status')->sortable()->title('Status')->searchable('caregivers', ['status'])->html(function (Caregiver $caregiver) {
            return $this->statusColumn($caregiver->status);
        });

        $table->column('status')->sortable()->title('Verified Email')->html(function (Caregiver $caregiver) {
            return $this->booleanColumn($caregiver->user->email_verified_at);
        });

        $table->column('created_at')->title('Created at')->dateTimeFormat('M d Y H:i:s')->sortable();

        $table->column('id')->title('Actions')->html(function (Caregiver $caregiver) {
            return $this->actionColumns($this->actions($caregiver));
        });

        return $table;
    }

    protected function actions(Caregiver $caregiver)
    {
        return [
            [
                'label' => 'View',
                'classes' => 'dropdown-item',
                'id' => $caregiver->id,
                'url' => route('admin.care-support-teachers.show', ['id' => $caregiver->id]),
                'data' => [],
                'visible' => true
            ],
            [
                'label' => 'Approve',
                'classes' => 'dropdown-item',
                'id' => '',
                'url' => '',
                'visible' => $caregiver->status === 'unapproved',
                'data' => [
                    'toggle' => 'modal',
                    'target' => '#approve-care-support-teacher',
                    'url'   => route('admin.care-support-teachers.update-status', ['id' => $caregiver->id]),
                    'status' => Status::APPROVED
                ]
            ]
        ];
    }
}
