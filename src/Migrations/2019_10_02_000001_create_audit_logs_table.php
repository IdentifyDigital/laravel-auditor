<?PHP

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditLogsTable extends Migration
{
	/**
	 * The name of the table that will be created
	 *
	 * @var String $table_name
	 */
	protected $table_name = 'audit_logs';
	
	/**
	 * Create the table and build up the collumns when this migration is
	 * ran
	 * 
	 * @return void
	 */
	public function up()
	{
		// Check that our table doesn't already exist, and if it doesn't
		// go ahead and continue building it.
		if (!Schema::hasTable($this->table_name))
			// It's all good, build the table
			Schema::create($this->table_name, function (Blueprint $table) {
				$this->_buildColumns($table);
			});
	}
	
	/**
	 * Method to build the actual collumns that will end
	 * up in the table.
	 *
	 * @param Illuminate\Database\Schema\Blueprint $table [ The table to build the collumns for ]
	 *
	 * @return Illuminate\Database\Schema\Blueprint  	  [ A pointer back to the table ]
	 */
	protected function _buildColumns(Blueprint $table)
	{
		// Table Meta Data
		$table->increments('id');
		$table->timestamps();
		$table->softDeletes();
		
		// AUDIT_LOGS ( Message, Relation, Relation_Id )
		$table->longText('message')
			  ->comment('A descript of what is being logged');
			  
		$table->string('relation')
			  ->comment('Namespace of the object type this audit log is for');
		
		$table->unsignedInteger('relation_id')
			  ->comment('The ID of the related object for this audit log line');
		
		return $table;
	}
	
	/**
	 * Destroy the table when rolling back migrations
	 * 
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->table_name);
	}
}