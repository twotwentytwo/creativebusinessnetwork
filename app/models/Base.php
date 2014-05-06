<?php

class Base extends Eloquent {
/*
    public function __construct($data)
    {
        foreach ($data as $prop => $value) {
            $this->$prop = $value;
        }
    }
*/
    public function url_key()
    {
        return ShortKey::toKey($this);
    }
/*
    protected static function table()
    {
        return DB::table(static::$table);
    }

    public static function all()
    {
        $items = array();
        $results = static::table()->get();
        $class = get_called_class();
        foreach ($results as $result) {
            $items[] = new $class($result);
        }
        return $items;
    }
*/

}