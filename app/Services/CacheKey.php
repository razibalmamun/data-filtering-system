<?php
namespace App\Services;

class CacheKey {

    /**
     * to generate readis cache key
     */
    public function get($month, $year) : string
    {
        if(empty($month) && empty($year)){
            return 'all';
        } elseif(!empty($month) && !empty($year)){ 
            return 'month-'.$month.'-year-'.$year;
        } else if($month) {
            return 'month-'.$month;
        } else if($year) {
            return 'year-'.$year;
        }
    }
}