<?php

namespace Database\Seeders;

use App\Models\FieldType;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (FieldType::FIELD_TYPES as $fieldType) {
            FieldType::create($fieldType);
        }
    }
}
