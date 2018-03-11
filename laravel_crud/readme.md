## download video 
https://drive.google.com/file/d/1gNJXICVNVMNYIvRycDNmAXzfT-YCdMa3/view?usp=sharing

## or watch on youtube 
https://www.youtube.com/watch?v=l8lA34LZ-DI


## installing laravel 

~~~php
composer create-project laravel/laravel feni
~~~

## connecting with database in  .env file

~~~php
DB_DATABASE=feni
DB_USERNAME=root
DB_PASSWORD=
~~~

## defining default string maximum 191  chracter length inside AppServiceProvider boot method (If you using older mysql version. Normally we all are using older version)     

~~~php
  Schema::defaultStringLength(191);
~~~

## making model with migration, resource controller, factory by putting `a` flag

~~~php
php artisan make:model Note -a
~~~

## writing migration inside note migration file 

~~~php
$table->string('title');
$table->text('description');
$table->integer('complete')->default(0);
~~~

## migrate to database 

~~~php
php artisan migrate
~~~

## dropping all tables from database and create again 

~~~php
php artisan migrate:fresh
~~~

## write fake data inside note factory file 

~~~php
  'title' => $faker->sentence,
  'description' => $faker->paragraph(4),
~~~

## adding factory to database seed and tell how many row you want to seed 

~~~php
# inside DatabaseSeeder.php run method
factory(Note::class, 30)->create();
~~~

## seeding using artisan command   

~~~php
php artisan db:seed
~~~

## migration and seeding in same time 

~~~php
php artisan migrate --seed 
# or if you want to dropping earlier database tables and then seeding
php artisan migrate:fresh --seed 
~~~





## defining resource route 

~~~php
Route::resource('notes', 'NoteController');
~~~

## redirect in laravel 

~~~php
return redirect('notes');
~~~

## showing view and passing variable to a view from controller 

~~~php
public function index()
{
    $notes = Note::paginate(10);
    return view('notes.index', compact('notes'));
}
public function show(Note $note)
{
    return view('notes.show', compact('note'));
}
~~~

## passing variable to view 

~~~php
$notes = Note::paginate(10);
# passing variable to view in 4 different ways
return view('notes.index', compact('notes'));
return view('notes.index', ['notes' => $notes]);
return view('notes.index')->with('notes', $notes);
return view('notes.index')->withNotes($notes);
~~~

## yielding in master view for `content` section

~~~php
# inside master.blade.php
@yield('content')
~~~

## extends master in view file and write content inside `content` section    

~~~php
# inside index.balde.php
@extends('master')
@section('content')

@endsection
~~~

##  iterating variable using blade directives 

~~~html
@foreach($notes as $note)
<div class="card my-2">
  <div class="card-body">
    <h4>
      <a href="{{route('notes.show', $note->id)}}">
        {{$note->title}}
      </a>
    </h4>
  </div>
</div>
@endforeach
~~~

<!-- ## `echo` using `{% raw %}{{}}{% endraw %}`      -->

## `echo` using `{{}}`           

~~~html

## in php
<?php echo $hello ?>
# or
<?= $hello ?>

# in blade
{{ $hello }}    
~~~

# csrf and method inside form incase of creating, editing, deleting

~~~php
# cross site request forgery   
@csrf 
# for update
@method('put')
# for delete
@method('delete')
~~~

## how to validate a form  

~~~php
$this->validate($request, [
  'title' => 'required|min:3',
  'email' => 'required|min:3|email|unique:users',
]);
~~~

## how to show errors in from 

~~~php
@if (count($errors->all))
  foreach($errors->all() as $error)
    <li>{{$error}}</li>
  @endforeach
@endif
~~~

## paginate with orderBy 

~~~php
$notes = Note::orderBy('id', 'desc')->paginate(10);

# to show pagination links in blade file
$notes->links();
~~~

## how to run other people code on your pc

~~~php
composer install
php artisan config:clear
php artisan cache:clear
php artisan view:clear

copy .env.example file to .env file

php artisan key:generate

~~~


# adding built in authentication in your application     

==========================================================

## making auth boilerplate code using php artisan 

~~~php
php artisan make:auth
~~~

## how to logout 

~~~php
<form class="d-inline-block float-right" action="{{route('logout')}}" method="post">
  @csrf
  <button class="btn btn-secondary" type="submit">{{auth()->user()->name}} | Logout</button>
</form>
~~~

## to check whether user is logged in or not 

~~~php
@auth 
@endauth
~~~

## to check whether guest or not 

~~~php
@guest
@endguest
~~~

## adding login in our page 

~~~php
<a href="{{route('login')}}" class="btn btn-secondary float-right">Login </a>
~~~

## how to access user data in laravel 

~~~php
auth()->user()->name
# or
Auth::user()->name
~~~

## how to redirect to certain routes after login or register 

~~~php
# RegisterController.php 
# LoginController.php

protected $redirectTo = '/notes';

~~~

## how to add authenticate middleware in a controller 

~~~php
# Yourcontroller.php
public function __construct () {
  $this->middleware('auth');
}
# when I allow some guest user in laravel 
public function __construct () {
  $this->middleware('auth')->except('index');
}
# or for multiple 
public function __construct () {
  $this->middleware('auth')->except(['index', 'show']);
}
~~~

## how to grouping route 

~~~php
Route::group(['prefix' => 'dhaka', 'middleware' => 'auth' ], function () {
  // your all route
});
~~~


## how to add middleware and name to individual route 

~~~php
Route::get('/hello', [
  'uses' => 'YourController@action',
  'as' => 'your_route_name',
  'middleware' => 'auth'
]);
~~~

## how to use random id from database inside factory  

~~~php
$factory->define(App\Note::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'description' => $faker->paragraph(4),
      'user_id' => function () {
        return User::all()->random();
      }
    ];
});
~~~

## how to use user value in factory 

~~~php

$users = [
  [
    'name' => 'nur',
    'email' => 'nur@gmail.com'
  ]
];
foreach ($users as $user) {
  factory(User::class)->create([
    'name' => $user['name'],
    'email' => $user['email']
  ]);
}
~~~













