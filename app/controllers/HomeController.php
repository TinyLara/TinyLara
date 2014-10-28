<?php
/**
* \HomeController
*/
class HomeController extends BaseController {

  public function home()
  {
    // build view sample
    $this->view = View::make('home')->with('article',Article::first())
                                    ->withTitle('TinyLara :-D')
                                    ->withFooBar('foo_bar');
    /*
    // build mail sample
    Mail::to('foo@bar.io')->from('bar@foo.io')
                          ->title('Foo Bar')
                          ->content('<h1>Hello~~</h1>')
                          ->send();
    // redis sample
    Redis::set('key','value',3000,'ms');
    echo Redis::get('key');
    */
  }
}