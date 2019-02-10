<?php

namespace App\Repositories\Settings;

trait PresentationTrait
{
	/**
	 * [getStatus description]
	 * @return [type] [description]
	 */
	public function getStatus()
	{
        return self::DISPLAY_STATUS[$this->status ?? self::DISABLE];
	}	

	public function getType()
	{
        return self::DISPLAY_TYPE[$this->type ?? self::NORMAL];
	}
}
