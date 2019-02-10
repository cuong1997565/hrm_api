<?php

namespace App\Repositories\Settings;

use App\Repositories\BaseRepository;
use App\Repositories\UploadTrait;

class SettingRepository extends BaseRepository
{
    use UploadTrait;
    /**
     * Setting model.
     * @var Model
     */
    protected $model;

    /**
     * SettingRepository constructor.
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    /**
     * Lấy tất cả giá trị hợp lệ của kiểu dữ liệu
     * @return [type] [description]
     */
    public function getAllType()
    {
        return implode(',', Setting::ALL_TYPE);
    }

    /**
     * Thay đổi trạng thái
     * @param  integer $id ID
     * @return [type]      [description]
     */
    public function changeStatus($id)
    {
        $setting = parent::getById($id);
        if ($setting->status == Setting::ENABLE) {
            return parent::update($id, ['status' => Setting::DISABLE]);
        } else {
            return parent::update($id, ['status' => Setting::ENABLE]);
        }
    }
}
