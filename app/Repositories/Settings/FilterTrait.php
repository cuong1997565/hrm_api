<?php

namespace App\Repositories\Settings;

trait FilterTrait
{
	/**
	 * Tìm kiếm theo tên, slug, giá trị
	 * @param  [type] $query [description]
	 * @param  string $q     name, slug, value
	 * @return Collection Setting Model
	 */
    public function scopeQ($query, $q)
    {
        if ($q) {
            return $query->where('name', 'like', "%${q}%")
            ->orWhere('slug', 'like', "%${q}%")
            ->orWhere('value', 'like', "%${q}%");
        }
        return $query;
    }

    /**
     * Tìm kiếm theo trạng thái
     * @param  [type] $query  [description]
     * @param  int    $status status
     * @return Collection Contract Model
     */
    public function scopeStatus($query, $status)
    {
        if (is_numeric($status)) {
            return $query->where('status', $status);
        }
        return $query;
    }
}
