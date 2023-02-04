<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    use HasFactory;

    const FIELD_TYPES = [
        [
            'element' => 'text-input',
            'nice_name' => 'Text input',
        ],
        [
            'element' => 'number-input',
            'nice_name' => 'Number input',
        ],
        [
            'element' => 'email-input',
            'nice_name' => 'Email input',
        ],
        [
            'element' => 'url-input',
            'nice_name' => 'URL input',
        ],
        [
            'element' => 'text-area',
            'nice_name' => 'Text area',
        ],
        [
            'element' => 'select',
            'nice_name' => 'Dropdown',
        ],
        [
            'element' => 'file',
            'nice_name' => 'File upload',
        ],
        [
            'element' => 'checkbox',
            'nice_name' => 'Checkbox',
        ],
    ];

    protected $fillable = [
        'element',
        'nice_name',
    ];
}
