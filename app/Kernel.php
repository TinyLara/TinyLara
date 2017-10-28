<?php

namespace App;

use TinyLara\Stone\Application;
use TinyLara\Contracts\Kernel as HttpKernel;

use Exception, Throwable;

class Kernel implements HttpKernel
{
  protected $app;
  protected $commandsLoaded = false;
  
  protected $bootstrappers = [
    \TinyLara\Stone\Bootstrap\LoadConfiguration::class,
    // 'Illuminate\Foundation\Bootstrap\DetectEnvironment',
    // 'Illuminate\Foundation\Bootstrap\LoadConfiguration',
    // 'Illuminate\Foundation\Bootstrap\ConfigureLogging',
    // 'Illuminate\Foundation\Bootstrap\HandleExceptions',
    // 'Illuminate\Foundation\Bootstrap\RegisterFacades',
    // 'Illuminate\Foundation\Bootstrap\SetRequestForConsole',
    // 'Illuminate\Foundation\Bootstrap\RegisterProviders',
    // 'Illuminate\Foundation\Bootstrap\BootProviders',
  ];

  public $routeMiddleware = [
    'test' => \App\Middleware\Test::class,
  ];

  public function __construct(Application $app)
  {
    $this->app = $app;
  }
  public function bootstrap()
  {
    if (! $this->app->hasBeenBootstrapped()) {
      $this->app->bootstrapWith($this->bootstrappers());
    }
  }
  public function getApplication()
  {
    return $this->app;
  }

  public function handle($request, $output = null)
  {
    try {
      $this->bootstrap();

      require BASE_PATH.'/config/routes.php';
      $request->response->return = \Route::dispatch();
      return $request->response;
    } catch (Exception $e) {
      $this->logError($e);
    } catch (Throwable $e) {
      $this->logError($e);
    }
  }

  protected function bootstrappers()
  {
    return $this->bootstrappers;
  }
  protected function commands() {}

  protected function logError(Throwable $exception) {
    $formattedException = array(
      'class' => get_class($exception),
      'message' => $exception->getMessage(),
      'code' => $exception->getCode(),
      'file' => $exception->getFile() . ':' . $exception->getLine(),
    );

    $formattedException['trace'] = $exception->getTraceAsString();
    \Log::error($formattedException);
    throw new $exception;
  }
}
