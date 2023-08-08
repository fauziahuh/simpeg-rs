<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        // Check if the user has an associated employee record
        $employee = Employee::where('nama', $user->name)->first();

        if ($employee) {
            // If the employee exists, update the user_id in the Employee table
            $employee->user_id = $user->id;
            $employee->save();
        }
    }
}
