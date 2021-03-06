<?php
/**
 * 雪花算法 Trait
 *
 * @author herry@<yuandeng@aliyun.com>
 * @version 1.0
 * @copyright © 2020 MuCTS.com All Rights Reserved.
 */

namespace MuCTS\Laravel\Snowflake\Models\Traits;


use MuCTS\Laravel\Snowflake\Facades\Snowflake as SnowflakeFacade;

/**
 * Trait Snowflake
 * @package MuCTS\Laravel\Snowflake\Models\Traits
 */
trait Snowflake
{
    protected static function boolSnowflake()
    {
        static::saving(function ($model) {
            if (is_null($model->getKey())) {
                $model->setIncrementing(false);
                $keyName = $model->getKeyName();
                $id = SnowflakeFacade::next();
                $model->setAttribute($keyName, $id);
            }
        });
    }
}