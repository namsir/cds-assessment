<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create( 'tbldat_Users', function ( Blueprint $table ) {
                $table->bigIncrements( 'PRI' );
                $table->string( 'name' );
                $table->string( 'email' )->unique();
                $table->timestamp( 'email_verified_at' )->nullable();
                $table->string( 'password' );
                $table->rememberToken();
                $table->timestamps();

            } );

            Schema::create( 'tbldat_Companies', function ( Blueprint $table ) {
                $table->bigIncrements( 'PRI' );
                $table->unsignedBigInteger( 'User_Key' )->index();
                $table->string( 'CompanyName', 255 );
                $table->string( 'Ticker', 50 )->nullable();
                $table->string( 'NickName', 255 )->nullable();
                $table->string( 'Address_1', 255 )->nullable();
                $table->string( 'Address_2', 255 )->nullable();
                $table->string( 'City', 255 )->nullable();
                $table->string( 'State', 5 )->nullable();
                $table->string( 'PostalCode', 10 )->nullable();
                $table->string( 'HomeCountry', 255 )->nullable();
                $table->string( 'MainCountryOfOrigin', 255 )->nullable();
                $table->tinyInteger( 'Active' )->nullable();
                $table->tinyInteger( 'Deleted' )->nullable();
                $table->tinyInteger( 'Archived' )->nullable();
                $table->foreign( 'User_Key' )->references( 'PRI' )->on( 'tbldat_Users' )->onDelete( 'CASCADE' );
            } );


            Schema::create( 'tbldat_BusinessContacts', function ( Blueprint $table ) {
                $table->bigIncrements( 'PRI' );
                $table->unsignedBigInteger( 'Company_Key' )->index();
                $table->string( 'Title', 50 )->nullable();
                $table->string( 'FName', 50 )->nullable();
                $table->string( 'MName', 50 )->nullable();
                $table->string( 'LName', 50 )->nullable();
                $table->string( 'Suffix', 50 )->nullable();
                $table->string( 'Address_1', 255 )->nullable();
                $table->string( 'Address_2', 255 )->nullable();
                $table->string( 'City', 50 )->nullable();
                $table->string( 'State', 5 )->nullable();
                $table->string( 'PostalCode', 24 )->nullable();
                $table->string( 'Website', 255 )->nullable();
                $table->string( 'Email_Primary', 255 )->nullable();
                $table->string( 'Email_2', 255 )->nullable();
                $table->string( 'Email_3', 255 )->nullable();
                $table->string( 'Email_4', 255 )->nullable();
                $table->string( 'Phone_Primary', 10 )->nullable();
                $table->string( 'Phone_Mobile', 10 )->nullable();
                $table->string( 'Phone_Land', 10 )->nullable();
                $table->string( 'Phone_Fax', 10 )->nullable();
                $table->string( 'TwitterHandle', 255 )->nullable();
                $table->string( 'FacebookName', 255 )->nullable();
                $table->tinyInteger( 'Active' )->nullable()->default( 1 );
                $table->tinyInteger( 'Deleted' )->nullable()->default( 0 );
                $table->tinyInteger( 'Archived' )->nullable()->default( 0 );

                $table->foreign( 'Company_Key' )->references( 'PRI' )->on( 'tbldat_Companies' )->onDelete( 'CASCADE' );

            } );


            Schema::create( 'tbldat_Logs', function ( Blueprint $table ) {
                $table->bigIncrements( 'PRI' );
                $table->unsignedBigInteger('User_Key');
                $table->string( 'Action' );
                $table->string( 'Subject' );
                $table->timestamps();
            } );



        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists( 'users' );
        }
    }
