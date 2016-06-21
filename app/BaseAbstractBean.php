<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseAbstractBean extends Model
{

    public function setAttributes($data)
    {
        if (is_object($data) && $data instanceof BaseAbstractBean)
        {
            $data = $data->toArray();
        }
        if (!is_array($data))
        {
            return;
        }

        foreach ($data as $key => $value)
        {
            if (property_exists($this, $key))
            {
                $this->setAttribute($key, $value);
            }
        }
    }

    public function getAttributes()
    {
        return parent::getAttributes();
    }

    public function getClassName()
    {
        return get_class();
    }

}
