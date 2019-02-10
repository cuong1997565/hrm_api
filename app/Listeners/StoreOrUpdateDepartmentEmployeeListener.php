<?php

namespace App\Listeners;

use App\Events\StoreOrUpdateDepartmentEmployeeEvent;

class StoreOrUpdateDepartmentEmployeeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */

    /**
     * store to department_employee table
     * @param  Employee   $employee [description]
     * @param  array  $data [department_id, position_id, status]
     * @return [type]       [description]
     */
    public function handle(StoreOrUpdateDepartmentEmployeeEvent $event)
    {
        // dd($event->departments);
        /*department_employee
        [
            employee_id,
            department_id,
            position_id,
            status
        ]
        =>
        [department_id => ['position_id' => '', 'status' => '']]*/
        $insertData = [];
        foreach ($event->departments as $key => $value) {
            $insertData[$value['department_id']] = [
                'position_id' => $value['position_id'],
                'status' => array_get($event->departments, $key.'.status', 0)
            ];
        }
        $event->employee->departments()->sync($insertData);
    }
}
