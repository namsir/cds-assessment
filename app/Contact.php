<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Contact extends Model
    {
        protected $table      = 'tbldat_BusinessContacts';
        protected $primaryKey = 'PRI';

        public function company()
        {
            return $this->belongsTo( Company::class, 'Company_Key' );
        }
    }
