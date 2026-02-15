<?php

namespace Database\Seeders;

use App\Option\Infrastructure\Persistence\Eloquent\EloquentOptionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EloquentOptionModel::create([
            'key' => 'business_url',
            'value' => 'https://yandex.com/maps/org/samoye_populyarnoye_cafe_tsentr/1010501395',
            'title' => 'aaa',
            'description' => 'bbb',
            'validation_rules' => "[\"regex:/^(https:\\\\/\\\\/|)yandex\\\\.(ru|com)\\\\/maps\\\\/org\\\\/[\\\\da-zA-Z_-]+\\\\/\\\\d+.*$/u\"]"
        ]);
    }
}
