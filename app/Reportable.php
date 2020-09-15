<?php

namespace App;

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
            // 'subject_id' => $user->id,
            // 'subject_type' => $type,
            'description' => $description
        ]);
    }
}
