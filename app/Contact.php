<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Contact extends Model
    {
        protected $table      = 'tbldat_BusinessContacts';
        protected $primaryKey = 'PRI';
        protected $guarded    = [ 'PRI' ];
        Const UPDATED_AT = null;
        Const CREATED_AT = null;

        public function company()
        {
            return $this->belongsTo( Company::class, 'Company_Key' );
        }
    }
