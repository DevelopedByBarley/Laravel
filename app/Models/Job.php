<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;

    public static function jobs(): array
    {
        return [

            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$100,000'
            ]
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(Job::jobs(), fn($job) => $job['id'] == $id) ?? abort(404);
        return $job;
    }
}
