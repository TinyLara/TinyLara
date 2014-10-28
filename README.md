# *TinyLara*

```
  ______    _                      __
 /_  __/   (_)   ____    __  __   / /   ____ _   _____  ____ _
  / /     / /   / __ \  / / / /  / /   / __ `/  / ___/ / __ `/
 / /     / /   / / / / / /_/ /  / /___/ /_/ /  / /    / /_/ /
/_/     /_/   /_/ /_/  \__, /  /_____/\__,_/  /_/     \__,_/
                      /____/
```

TinyLara is a simple PHP framework based on Composer, looks like a Tiny Laravel. http://tinylara.com/

##Github

Github Repo: [https://github.com/TinyLara/TinyLara](https://github.com/TinyLara/TinyLara)

## Start
### Download:
```
git clone https://github.com/TinyLara/TinyLara
cd TinyLara
```

OR:

```
wget https://codeload.github.com/TinyLara/TinyLara/legacy.zip/master
unzip master
cd TinyLara*
```

### Install dependencies:

    composer update

Then modify `app/database.php` with right information and import `demo.sql`.

### Just see:

*config/routes.php :*

    Route::get('', 'HomeController@home');

*app/controllers/HomeController.php :*

    public function home()
    {
      // mail sample
      Mail::to('foo@bar.io')->from('bar@foo.io')
                            ->title('Foo Bar')
                            ->content('<h1>Hello~~</h1>')
                            ->send();
      // redis sample
      Redis::set('key','value',3000,'ms');
      echo Redis::get('key');

      // view sample
      return View::make('home')->with('article',Article::first())
                                ->withTitle('TinyLara :-D')
                                ->withFooBar('foo_bar');
    }

### Run:
```
cd public && php -S 127.0.0.1:3000
```
Visit [http://127.0.0.1:3000/](http://127.0.0.1:3000/)

### It's already running!
<br>

## Features

1. Tiny router [TinyLara/TinyRoute](https://packagist.org/packages/tinylara/tinyroute), based on fast and sexy [codingbean/macaw](https://packagist.org/packages/codingbean/macaw)
2. MVC architecture
3. One of the Most powerful PHP ORM on Earth: [Laravel Eloquent](http://laravel.com/docs/4.2/eloquent)
4. Powerful Laravel-style views loader
5. Redis ready in Laravel-style
6. Handy SMTP mailer


## License

The TinyLara framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
