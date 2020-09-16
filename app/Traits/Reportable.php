<?php

namespace App\Traits;

use App\Report;
/**
 * 
 */
trait Reportable
{
    public function reports()
    {
        return $this->morphMany(Report::class, 'subject');
    }

    public function report($description)
    {
        return $this->reports()->create([
            'reporter_id' => current_user()->id,
            'description' => $description
        ]);
    }
}
