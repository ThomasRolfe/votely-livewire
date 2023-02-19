<?php

namespace App\Enums;

use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\CheckboxSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\EmailInputSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\FileSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\NumberInputSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\SelectSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\TextAreaSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\TextInputSchemaForm;
use App\Http\Livewire\App\SubmissionSchemas\Components\SchemaForms\UrlInputSchemaForm;

enum FieldType: string
{
    case TextInput = 'text-input';
    case NumberInput = 'number-input';
    case EmailInput = 'email-input';
    case UrlInput = 'url-input';
    case TextArea = 'text-area';
    case Dropdown = 'select';
    case FileUpload = 'file';
    case Checkbox = 'checkbox';

    public function niceName(): string
    {
        return match($this) {
            FieldType::TextInput => 'Text input',
            FieldType::NumberInput => 'Number input',
            FieldType::EmailInput => 'Email input',
            FieldType::UrlInput => 'Url input',
            FieldType::TextArea => 'Text area',
            FieldType::Dropdown => 'Dropdown',
            FieldType::FileUpload => 'File upload',
            FieldType::Checkbox => 'Checkbox',
        };
    }

    public function submissionSchemaComponent(): string
    {
        return match($this) {
            self::TextInput => TextInputSchemaForm::class,
            self::NumberInput => NumberInputSchemaForm::class,
            self::EmailInput => EmailInputSchemaForm::class,
            self::UrlInput => UrlInputSchemaForm::class,
            self::TextArea => TextAreaSchemaForm::class,
            self::Dropdown => SelectSchemaForm::class,
            self::FileUpload => FileSchemaForm::class,
            self::Checkbox => CheckboxSchemaForm::class,
        };
    }
}
