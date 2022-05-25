<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'group_id',
        'address',
        'rating',
        'description',
        'concept',
        'tag',
        'min_guest_quantity',
        'max_guest_quantity',
        'budget',
        'time_open',
        'time_close',
        'phone'
    ];
    public function run()
    {
        Location::factory()
            ->count(10)
            ->create();
    }
    public function getWithFilters($filter_company, $filter_budget, $filter_mood, $filter_type) {
        $rules = [];
        if ($filter_company !== 'null') {
            $min_guest = explode("_", $filter_company)[0];
            $max_guest = explode("_", $filter_company)[1];
            if ($max_guest !== 'many') {
                $rules[] = ['min_guest_quantity', '>=', $min_guest];
                $rules[] = ['max_guest_quantity', '<=', $max_guest];
            } else {
                $rules[] = ['min_guest_quantity', '>=', $min_guest];
            }
        }
        if ($filter_budget !== 'null') {
            $min_budget = explode("_", $filter_budget)[0] ? explode("_", $filter_budget)[0] : 0;
            $max_budget = explode("_", $filter_budget)[1] ? explode("_", $filter_budget)[1] : 0;
            $rules[] = ['budget', '>=', $min_budget];
            $rules[] = ['budget', '<=', $max_budget];
        }
        if ($filter_mood !== 'null') {
            $mood = $filter_mood;
            $rules[] = ['tag', $mood];
        }
        if ($filter_type !== 'null') {
            $type = $filter_type;
            $rules[] = ['concept', $type];
        }
//        $rules1 = $max_guest !== 'many' ? [
//            ,
//            ['budget', '>=', $min_budget],
//            ['budget', '<=', $max_budget], ['tag', $mood], ['concept', $type]] : [['min_guest_quantity', '>=', $min_guest], ['budget', '>=', $min_budget],
//            ['budget', '<=', $max_budget], ['tag', $mood], ['concept', $type]];
        return Location::where($rules)->get();
    }
}
