<?php

namespace App\Repositories\Users;

use Event;
use App\User;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\ContractRepository;
use App\Events\StoreContractUserEvent;
use App\Events\UpdateContractUserEvent;
use App\Events\StoreOrUpdateDepartmentUserEvent;

class UserRepository extends BaseRepository
{
    /**
     * User model.
     * @var Model
     */
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Lấy tất cả giá trị hợp lệ của trạng thái
     * @return string
     */
    public function getAllStatus()
    {
        return implode(',', User::ALL_STATUS);
    }

    /**
     * Thay đổi trạng thái
     * @param  integer $id ID
     * @return [type]      [description]
     */
    public function changeStatus($id)
    {
        $user = parent::getById($id);
        if ($user->status == User::ENABLE) {
            parent::update($id, ['status' => User::DISABLE]);
        } else {
            parent::update($id, ['status' => User::ENABLE]);
        }
    }
}