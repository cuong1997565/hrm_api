<?php

namespace App\Repositories\Users;

trait FilterTrait
{
    /**
    * Tìm kiếm theo tên
    * @param  [type] $query [description]
    * @param  string $q     name
    * @return Collection User Model
    */
    public function scopeQ($query, $q)
    {
        if ($q) {
            return $query->where('name', 'like', "%${q}%");
        }
        return $query;
    }

    /**
     * Tìm kiếm theo trạng thái
     * @param  [type] $query  [description]
     * @param  int $status    status
     * @return [type]         [description]
     */
    public function scopeStatus($query, $status)
    {
        if (is_numeric($status)) {
            return $query->where('status', $status);
        }
        return $query;
    }
}
