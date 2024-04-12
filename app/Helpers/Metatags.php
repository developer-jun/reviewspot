<?php

namespace App\Helpers;

class Metatags
{
    public $title;
    public $meta_keywords;
    public $meta_description;    

    public function __construct($title = '', $meta_description = '', $meta_keywords = '')
    {
        $this->title = $title;
        $this->meta_keywords = $meta_keywords;
        $this->meta_description = $meta_description;        
    }
}
