<?php
class Base extends Eloquent {

    public function url_key()
    {
        return ShortKey::toKey($this);
    }

}