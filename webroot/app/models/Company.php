<?php

class Company extends Base {

    const KEY_PREFIX = 'c';

    const TABLE = 'companies';

    // @todo - get rid of eloquent
    protected $fillable = array('*');

    public static $_properties = array(
        'id',
        'name',
        'url_word',
        'short_description',
        'long_description',
        'location',
        'created_by',
        'created_at',
        'updated_at',
        'parent_company'
    );

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

    public static function findByParentCompany($company)
    {
        $companies = self::where('parent_company','=', $company->id)->get();
        return $companies;
    }

    public static function countByParentCompany($company)
    {
        return self::where('parent_company','=', $company->id)->count();
    }



    public static function findByChildCompany($company)
    {
        if ($company->parent_company) {
            return self::findById($company->parent_company);
        }
        return null;
    }

    public function url_entity()
    {
        if (isset($this->url_word) && !empty($this->url_word)) {
            return $this->url_word;
        }
        return $this->url_key();
    }


    public function setUrlWord($word)
    {
        $this->url_word = $word;
        return true;
    }

    public function setName($name)
    {
        $this->name = $name;
        return true;
    }

    public function setShortDescription($short_description)
    {
        $this->short_description = $short_description;
        return true;
    }

    public function setLongDescription($long_description)
    {
        $this->long_description = $long_description;
        return true;
    }

    public function setLocation($location)
    {
        $this->location = $location;
        return true;
    }

    public function hasLocation()
    {
        return (
        (isset($this->location) && !empty($this->location))
        );
    }

    public function hasShortDescription()
    {
        return (
            (isset($this->short_description) && !empty($this->short_description))
        );
    }

    public function hasDescription()
    {
        return (
            (isset($this->short_description) && !empty($this->short_description)) ||
            (isset($this->long_description) && !empty($this->long_description))
        );
    }

    public function getLongestDescription()
    {
        if (isset($this->long_description) && !empty($this->long_description)) {
            return $this->long_description;
        }

        if (isset($this->short_description) && !empty($this->short_description)) {
            return $this->short_description;
        }

        return null;
    }

}
