<?PHP
 
namespace IdentifyDigital\Auditor;

use Illuminate\Support\ServiceProvider;
use IdentifyDigital\Auditor\Auditor;

class AuditorServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap Services
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__.'/Migrations');
	}
	
	/**
	 * Register all kinds of services
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('auditor', function() {
			return new Auditor;
		});
	}
}