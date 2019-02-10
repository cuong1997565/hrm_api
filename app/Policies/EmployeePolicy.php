<?php

namespace App\Policies;

use App\User;
use App\Repositories\Employees\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories\Categories\Employee  $employee
     * @return mixed
     */
    public function view(User $user, Employee $employee = null)
    {
        return $user->hasAccess(['employee.view']);
    }

    /**
     * Determine whether the user can create employee.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess(['employee.create']);
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories\Categories\User  $employee
     * @return mixed
     */
    public function update(User $user, Employee $employee = null)
    {
        return $user->hasAccess(['employee.update']);
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories\Categories\User  $employee
     * @return mixed
     */
    public function delete(User $user, Employee $employee = null)
    {
        return $user->hasAccess(['employee.delete']);
    }
}
