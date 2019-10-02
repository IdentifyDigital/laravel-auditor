<?PHP

namespace IdentifyDigital\Auditor\Facades;

use Illuminate\Support\Facades\Facade;

class AuditorFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'auditor';
	}
}