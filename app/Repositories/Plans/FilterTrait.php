<?php

namespace App\Repositories\Plans;

trait FilterTrait
{
	/**
	 * Tìm kiếm theo tên kế hoạch
	 * @param  [type] $query [description]
	 * @param  [type] $q     title
	 * @return Collection Plan Model
	 */
	public function scopeQ($query, $q)
	{
		if ($q) {
			return $query->where('title', 'like', "%{$q}%");
		}
		return $query;
	}

	/**
	 * Tìm kiếm theo ngày bắt đầu
	 * @param  [type] $query     [description]
	 * @param  [type] $dateStart date_start
	 * @return Collection Plan Model
	 */
	public function scopeDateStart($query, $dateStart)
	{
		if ($dateStart) {
			return $query->where('date_start', '>=', $dateStart);
		}
		return $query;
	}	

	/**
	 * Tìm kiếm theo ngày kết thúc
	 * @param  [type] $query   [description]
	 * @param  [type] $dateEnd date_end
	 * @return Collection Plan Model
	 */
	public function scopeDateEnd($query, $dateEnd)
	{
		if ($dateEnd) {
			return $query->where('date_end', '<=', $dateEnd);
		}
		return $query;
	}

	/**
     * Tìm kiếm theo chi nhánh
     * @param  [type] $query        [description]
     * @param  int    $branchId     branchId
     * @return Collection Employee Model
     */
	public function scopeBranchID($query, $branchID)
	{
        /*
        SELECT * FROM plans 
        WHERE id in(
            SELECT plan_id FROM plan_details 
            WHERE department_id in (
                SELECT id FROM departments WHERE branch_id=$branchID)
                    )

         */
		if (is_numeric($branchID)) {
			$planDetails = app()->make(\App\Repositories\PlanDetails\PlanDetailRepository::class)
			->getByQuery(['branch_id' => $branchID], -1)
			->pluck('id');

			return $query->whereHas('details', function ($query) use ($planDetails) {
				$query->whereIn('id', $planDetails);
			});
		}
		return $query;
	}

    /**
    * Tìm kiếm theo phòng ban
    * @param  [type] $query        [description]
    * @param  int $departmentId     departmentId
    *@return Collection Plan Model
    */
    public function scopeDepartmentID($query, $departmentId)
    {
    	if (is_numeric($departmentId)) {
    		$departments = app()->make(\App\Repositories\PlanDetails\PlanDetailRepository::class)
    		->getByQuery(['department_id' => $departmentId], -1)
    		->pluck('id');

    		return $query->whereHas('details', function ($query) use ($departments) {
    			$query->whereIn('id', $departments);
    		});
    	}
    	return $query;
    }

    /**
     * Tìm kiếm theo chức danh
     * @param  [type] $query        [description]
     * @param  int    $positionId   positionId
     * @return Collection Plan Model
     */
    public function scopePositionID($query, $positionId)
    {
    	if (is_numeric($positionId)) {
    		$positions = app()->make(\App\Repositories\PlanDetails\PlanDetailRepository::class)
    		->getByQuery(['position_id' => $positionId], -1)
    		->pluck('id');

    		return $query->whereHas('details', function ($query) use ($positions) {
    			$query->whereIn('id', $positions);
    		});
    	}
    	return $query;
    }

    /**
     * Tìm kiếm theo trạng thái
     * @param  [type] $query  [description]
     * @param  int $status    status
     * @return Collection Plan Model
     */
    public function scopeStatus($query, $status)
    {
    	if (is_numeric($status)) {
    		return $query->where('status', $status);
    	}
    	return $query;
    }
}
