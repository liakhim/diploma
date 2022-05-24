<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function run()
    {
        Location::factory()
            ->count(10)
            ->create();
    }
    public function getWithFilters($filter_company) {
        $min_guest = explode("_", $filter_company)[0];
        $max_guest = explode("_", $filter_company)[1];
        $rules = $max_guest !== 'many' ? [
            ['min_guest_quantity', '>=', $min_guest],
            ['max_guest_quantity', '<=', $max_guest]] : [['min_guest_quantity', '>=', $min_guest]];
        return Location::where($rules)->get();
    }
}
