<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'category',
        'status',
        'start_date',
        'end_date',
        'state',
    ];

    protected $casts = [
        'state' => 'boolean',
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                switch ($value) {
                    case 0:
                        return ["style" => 'new', "label" => 'New'];
                    case 1:
                        return ["style" => "in-progress", "label" => 'In Progress'];
                    case 2:
                        return ["style" => "on-pause", "label" => 'On Pause'];
                    case 3:
                        return ["style" => "completed", "label" => 'Completed'];
                    case 4:
                        return ["style" => "completed-advance", "label" => 'Completed Advance'];
                    case 5:
                        return ["style" => "completed-late", "label" => 'Completed Late'];
                    case 6:
                        return ["style" => "late", "label" => 'Late'];
                    case 7:
                        return ["style" => "abandoned", "label" => 'Abandoned'];
                    default:
                        return ["style" => "new", "label" => "New"];
                }
            }
        );
    }
}
