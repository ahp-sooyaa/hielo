<?php

namespace App;

/**
 * 
 */
trait RecordActivity
{
    protected static function bootRecordActivity()
    {
        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    protected static function getActivitiesToRecord()
    {
        return ['created', 'updated', 'deleted'];
    }

    protected function recordActivity($event)
    {
        $this->activiy()->create([
            'causer_id' => current_user()->id,
            'causer_type' => current_user()->roles[0]->name,
            'description' => $event
        ]);
    }

    public function activiy()
    {
        return $this->morphMany('App\Activity', 'subject');
    }
}
