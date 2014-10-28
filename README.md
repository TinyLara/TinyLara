# *TinyLara*

```
  ______    _                      __
 /_  __/   (_)   ____    __  __   / /   ____ _   _____  ____ _
  / /     / /   / __ \  / / / /  / /   / __ `/  / ___/ / __ `/
 / /     / /   / / / / / /_/ /  / /___/ /_/ /  / /    / /_/ /
/_/     /_/   /_/ /_/  \__, /  /_____/\__,_/  /_/     \__,_/
                      /____/
```

TinyLara is a Simple PHP Framework based on Composer, looks like a Tiny Laravel. [中文简介](#中文简介)

## Start
### Download:

```bash
git clone https://github.com/TinyLara/TinyLara
cd TinyLara
```

OR:

```bash
wget https://codeload.github.com/TinyLara/TinyLara/legacy.zip/master
unzip master
cd TinyLara*
```

### Install dependencies:

```bash
composer update
```

Then modify `app/database.php` with right information and import `demo.sql`.

### Just see:

*config/routes.php :*

```php
Route::get('', 'HomeController@home');
```

*app/controllers/HomeController.php :*

```php
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
```

### Run:
```bash
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

<br>
<hr>

#中文简介

TinyLara 是一个轻量级 PHP 框架，基于 Composer，可以看成 Laravel 的精简版。

##Github

Github 项目地址：https://github.com/TinyLara/TinyLara

##开始使用

###下载：
```bash
git clone https://github.com/TinyLara/TinyLara
cd TinyLara
```

或者：

```bash
wget https://codeload.github.com/TinyLara/TinyLara/legacy.zip/master
unzip master
cd TinyLara*
```

###安装依赖包：

```bash
composer update
```


修改数据库配置文件 `app/database.php`，将 `demo.sql` 导入数据库。

###查看代码：

*config/routes.php :*

```php
Route::get('', 'HomeController@home');
```

*app/controllers/HomeController.php :*

```php
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
```

###运行项目：
```bash
cd public && php -S 127.0.0.1:3000
```
访问 [http://127.0.0.1:3000/](http://127.0.0.1:3000/)

###TinyLara 已经跑起来了！
<br>

##特性

1. 微型路由包 [TinyLara/TinyRoute](https://packagist.org/packages/tinylara/tinyroute), 基于性感而快速的 [codingbean/macaw](https://packagist.org/packages/codingbean/macaw)
2. MVC 架构
3. 采用地球上最强大的 PHP ORM 之一：[Laravel Eloquent](http://laravel.com/docs/4.2/eloquent)
4. 优雅而强大的 Laravel 式的视图加载器
5. 支持原生 PHP 操作 Redis，无需安装任何 PHP 扩展。
6. 一行代码即可发送 SMTP 邮件。


##协议

TinyLara 采用 [MIT license](http://opensource.org/licenses/MIT) 协议分发，衍生项目除了必须采用 MIT 协议之外无任何限制。