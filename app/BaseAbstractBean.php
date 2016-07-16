<?php

namespace App;


class BaseAbstractBean
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
                $this->$key = $value;
            }
        }
    }

}
