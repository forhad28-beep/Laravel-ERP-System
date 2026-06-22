<?php

use App\Models\ActivityLog;

function activityLog($module, $action)
{
    ActivityLog::create([
        'module' => $module,
        'action' => $action,
        'user_name' => auth()->check()
            ? auth()->user()->name
            : 'System',
    ]);
}