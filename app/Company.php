<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Company extends Model
    {
        protected $table      = 'tbldat_Companies';
        protected $primaryKey = 'PRI';
        protected $guarded    = [];
        CONST UPDATED_AT = null;
        CONST CREATED_AT = null;


        public function users()
        {
            return $this->belongsToMany( User::class, 'tbldat_UserCompanies' );
        }

        public function contacts()
        {
            return $this->hasMany( Contact::class, 'Company_Key', 'PRI' );
        }



    }