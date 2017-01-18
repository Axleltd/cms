<?php
namespace App\Presenters;

trait ProfilePresenter
{
    public function getFullNameAttribute(): integer
    {
        return $this->first_name() .' '.$this->last_name();
    }
}