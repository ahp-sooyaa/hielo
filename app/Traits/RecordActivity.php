<?php

namespace App\Traits;

use App\Activity;

/**
 *
 */
trait RecordActivity
{
    protected static function bootRecordActivity()
    {
        if (auth()->check()) {
            if (auth_user()->isSuperAdmin() || auth_user()->isAdmin()) {
                foreach (static::getActivitiesToRecord() as $event) {
                    static::$event(function ($model) use ($event) {
                        $model->recordActivity($event);
                    });
                }
            };
        }

        static::deleting(function ($model) {
            $model->activiy()->delete();
        });
    }

    protected static function getActivitiesToRecord()
    {
        return ['created', 'updated'];
    }

    protected function recordActivity($event)
    {
        $this->activiy()->create([
            'causer_id' => auth_user()->id,
            'causer_type' => auth_user()->roles[0]->name,
            'description' => $event
        ]);
    }

    public function activiy()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
