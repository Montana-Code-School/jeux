## Database Specs

For the application Jeux we are using a MySql database.  The database is made up of 5 tables: Users, Games, Inventories, Friends, and Password_resets. The Users table will store user information as well as there token.  Games will store our "master" list of games.  We are populating the games table from the BGG XML api.  Each user will pick which games they own.  The inventories table holds all information on which games users own and which games they have borrowed out, and or, borrowed themselves.  The friends table is a pivot table to describe which users have a friendship and therefore can view each others inventories.  Password_resets is for storing vital information required in re-setting a users password.

## Users Table
```Php
{

  $table->increments('id');
  $table->string('username');
  $table->string('email')->unique();
  $table->string('password');
  $table->string('name');
  $table->string('token');
  $table->remeberToken();
  $table->softDeletes();
  $table->timestamps();
}
```
## Games Table
```Php

{

  $table->increments('id');
  $table->string('name');
  $table->string('image')->default('gameAvatar.jpg');
  $table->integer('year')->nullable();
  $table->integer('min_player')->nullable();
  $table->integer('max_player')->nullable();
  $table->integer('min_age')->nullable();
  $table->integer('min_play')->nullable();
  $table->integer('max_play')->nullable();
  $table->mediumText('description')->nullable();
  $table->boolean('instructions')->nullable();
  $table->timestamps();
}
```

## Friends Table
```Php
{
  $table->integer('user_id')->unsigned();
  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
  $table->integer('friend_id')->unsigned();
  $table->foreign('friend_id')->references('id')->on('users');
}
```

## Inventory Table
```Php
{

  $table->increments('id');
  $table->integer('game_id')->unsigned();
  $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
  $table->integer('borrower_id')->unsigned()->nullable();
  $table->integer('owner_id')->unsigned();
  $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
  $table->date('date_borrowed')->nullable();
  $table->date('date_returned')->nullable();

}
```
## Password_Resets Table
``` Php
{
  $table->string('email')->index();
  $table->string('token');
  $table->timestamp('created_at')->nullable();

}
```
## Notifications Table
``` Php
{
  $table->increments('id')->nullable();
  $table->string('type')->nullable();
  $table->string('notifiable_type')->nullable();
  $table->integer('notifiable_id')->nullable();
  $table->text('data')->nullable();
  $table->timestamp('read_at')->nullable();
  $table->timestamps();

  $table->index(['notifiable_type', 'notifiable_id'])
}
