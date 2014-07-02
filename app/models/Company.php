<?php

class Company extends Base {

    const KEY_PREFIX = 'c';

    public $table = 'companies';

    public static function Register($companydata)
    {
        // create in database
        $company = new self;
        $company->name = $companydata['name'];
        if (isset($companydata['url_word']) && !empty($companydata['url_word'])) {
            $company->url_word = $companydata['url_word'];
        }
        $company->created_by = $companydata['creator']->id;
        $company->save();
        return $company;
    }

    public static function findByUrlWord($word)
    {
        $company = self::where('url_word','=', $word)->first();
        return $company;
    }

    public static function findByCreator($user)
    {
        $companies = self::where('created_by','=', $user->id)->get();
        return $companies;
    }

    public function url_entity()
    {
        if (isset($this->url_word) && !empty($this->url_word)) {
            return $this->url_word;
        }
        return $this->url_key();
    }

}