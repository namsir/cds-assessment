<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Log extends Model
    {
        protected $table      = 'tbldat_Logs';
        protected $primaryKey = 'PRI';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $guarded = [];

        public function loggable()
        {
            return $this->morphTo();
        }



        public function user(){
            return $this->belongsTo(User::class, 'User_Key', 'PRI');
        }
    }
