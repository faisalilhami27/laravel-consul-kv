<?php


use App\Console\Commands\consul\ConsulCommand;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
  public string $configPath;

  public function __construct($app)
  {
    parent::__construct($app);
    $this->configPath = $this->app->configPath(Constant::CONFIG_FILE);
  }

  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot(): void
  {
    $this->publishConfig();
    $this->commands(
      [
        ConsulCommand::class
      ]
    );
  }

  /**
   * Register the application services.
   *
   * @return void
   * @throws Exception
   */
  public function register(): void
  {
    $this->_config();
  }

  private function publishConfig(): void
  {
    $path = $this->_getConfigPath();
    $this->publishes([$path => $this->app->configPath('consul.php')], 'config');
  }

  private function _getConfigPath(): string
  {
    return __DIR__ . '/' . Constant::CONFIG_FILE;
  }

  private function _config()
  {
    $path = file_exists($this->configPath) ? $this->configPath : $this->_getConfigPath();

    $this->mergeConfigFrom($path, 'consul');
  }
}
