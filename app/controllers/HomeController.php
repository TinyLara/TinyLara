<?php
/**
* \HomeController
*/
class HomeController extends BaseController {

  public function home()
  {
    // build view sample
    $this->view = View::make('home')->with('article',Article::first())
                                    ->withTitle('MFFC :-D')
                                    ->withFooBar('foo_bar');
    /*
    // build mail sample
    $this->mail = Mail::to(['ooxx@gmail.com', 'ooxx@qq.com'])
                        ->from('OOXX <ooxx@163.com>')
                        ->title('Foo Bar')
                        ->content('<h1>Hello~~</h1>');
    // redis sample
    Redis::set('key','value',3000,'ms');
    echo Redis::get('key');
    */
  }
}