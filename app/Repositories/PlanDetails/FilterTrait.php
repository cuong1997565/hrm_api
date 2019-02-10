<?php

namespace App\Repositories\PlanDetails;

trait FilterTrait
{
	/**
	 * Tìm kiếm theo chi nhánh
	 * @param  [type] $query    [description]
	 * @param  [type] $branchID branch_id
	 * @return Collection PlanDetail Model
	 */
	public function scopeBranchID($query, $branchID)
	{
		/*
		SELECT * FROM plan_details 
            WHERE department_id in (
                SELECT id FROM departments WHERE branch_id=$branchID)
		 */
		if (is_numeric($branchID)) {
			$departments = app()->make(\App\Repositories\Departments\DepartmentRepository::class)
			->getByQuery(['branch_id' => $branchID], -1)
			->pluck('id');

			return $query->whereIn('department_id', $departments);
		}
		return $query;
	}
	
	/**
	 * Tìm kiếm theo phòng ban
	 * @param  [type] $query        [description]
	 * @param  [type] $departmentID department_id
	 * @return Collection PlanDetail Model
	 */
	public function scopeDepartmentID($query, $departmentID)
	{
		if (is_numeric($departmentID)) {
			return $query->where('department_id', $departmentID);
		}
		return $query;
	}	

	/**
	 * Tìm kiếm theo chức danh
	 * @param  [type] $query      [description]
	 * @param  [type] $positionID position_id
	 * @return Collection PlanDetail Model
	 */
	public function scopePositionID($query, $positionID)
	{
		if (is_numeric($positionID)) {
			return $query->where('position_id', $positionID);
		}
		return $query;
	}
}
