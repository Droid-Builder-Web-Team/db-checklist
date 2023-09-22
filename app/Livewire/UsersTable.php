<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;
    public $id;

    public function configure(): void
    {
        $this->setAdditionalSelects(['users.id as id']);
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Created at", "created_at")
            ->format(function ($value) {
                return Carbon::parse($value)->format('d F Y');
            })->sortable(),
            Column::make("Verified", "email_verified_at")
            ->format(function ($value) {
                if(!$value) {
                    return 'No';
                } else {
                    return Carbon::parse($value)->format('d F Y');
                }
            })
        ];
    }
}