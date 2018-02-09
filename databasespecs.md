## Database Specs

For the application Jeux we are using a MySql database.  The database is made up of 5 tables: Users, Games, Inventories, Friends, and Password_resets. The Users table will store user information as well as there token.  Games will store our "master" list of games.  We are populating the games table from the BGG XML api.  Each user will pick which games they own.  The inventories table holds all information on which games users own and which games they have borrowed out, and or, borrowed themselves.  The friends table is a pivot table to describe which users have a friendship and therefore can view each others inventories.  Password_resets is for storing vital information required in re-setting a users password.

## Users

```Php
{

  $table->increments('id');
  $table->string('username');
  $table->string('email');
  $table->string('password');
  $table->string('name');
  $table->string('token');
  $table->remeberToken();
  $table->softDeletes();
  $table->timestamps();
}
```
## Games
```Php

{

  $table->increments('id');
  $table->string('name');
  $table->date('year')->nullable;
  $table->integer('player_count')->nullable();
  $table->integer('min_age')->nullable();
  $table->time('min_play')->nullable();
  $table->time('max_play')->nullable();
  $table->mediumText('description')->nullable();
  $table->boolean('instructions')->nullable();
  $table->timestamps();
}
```

friends {

  $table->integer('user_id')->unsigned();
  $table->integer('friend_id')->unsigned();
}

inventory {

  $table->increments('id');
  $table->integer('game_id')->unsigned();
  $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
  $table->integer('borrower_id')->unsigned();
  $table->integer('owner_id')->unsigned();
  $table->boolean('borrowed');
  $table->date('date_borrowed');
  $table->date('date_returned');

}

password_resets {

  $table->string('email')->index();
  $table->string('token');
  $table->timestamp('created_at')->nullable();

}
