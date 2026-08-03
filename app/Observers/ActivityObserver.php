<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class ActivityObserver
{
    public function created(Model $model): void
    {
        $this->log($model, 'created', class_basename($model) . ' dibuat');
    }

    public function updated(Model $model): void
    {
        $this->log($model, 'updated', class_basename($model) . ' diperbarui');
    }

    public function deleted(Model $model): void
    {
        $this->log($model, 'deleted', class_basename($model) . ' dihapus');
    }

    protected function log(Model $model, string $action, string $description): void
    {
        $userId = auth()->id();

        if (! $userId) {
            return;
        }

        ActivityLog::create([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
        ]);
    }
}
