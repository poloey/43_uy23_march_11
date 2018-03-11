route
controller <==> model
view

seeding (seeder + factory)
migration

users 
  name
  email
categories 
  name
posts 
  title
  content
  category_id
  user_id

php artisan make:controller controllername (PostController)
php artisan make:model modelName (Post)
php artisan make:migration migration_name (create_posts_table)
php artisan make:factory factory_name
// php artisan make:seeder seeder_name (PostsTableSeeder)


php artisan make:model Post -mc
php artisan make:model Post -a



relation 
user hasMany Post::class
post belongsTo User::class

category hasMany Post::class
post belongsTo Category::class



/// todo 


todos 
texts 
complete

                                            