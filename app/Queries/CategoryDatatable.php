<?php

namespace App\Queries;

use App\Models\Doctor;

class CategoryDatatable
{
    public function get()
    {
        return Doctor::query();
    }
}
