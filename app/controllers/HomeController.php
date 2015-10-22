<?php
/**
* \HomeController
*/
class HomeController extends BaseController {

  public function home()
  {
    // var_dump(Article::count());
    $data = ['title'=>'你是谁？?', 'email'=>'1@baiducom'];
    $validator = $this->validate($data, [
      'title' => 'required|numeric|integer|min:3|max:4',
      'email' => 'required|email',
    ]);
    if ( !$validator->success ) {
      foreach ($validator->errors as $error) {
        echo $error.'<br>';
      }
    }
    Log::debug('First Debug Info.');
    /*
    // mail sample
    Mail::to('foo@bar.io')->from('bar@foo.io')
                          ->title('Foo Bar')
                          ->content('<h1>Hello~~</h1>')
                          ->send();
    // redis sample
    Redis::set('key','value',3000,'ms');
    echo Redis::get('key');
    */

    // return View
    return View::make('home')->with('article',Article::first())
                              ->withTitle('TinyLara :-D')
                              ->withFooBar('foo_bar');

    // return String
    return 'Hello TinyLara!';

    // or you can return Nothing.
  }
}