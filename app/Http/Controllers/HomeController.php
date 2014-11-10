<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Foundation\Application;

class HomeController extends Controller {

	/**
	 * The application implementation.
	 *
	 * @var Application
	 */
	protected $app;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Application  $app
	 * @return void
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Controller methods are called when a request enters the application
	| with their assigned URI. The URI a method responds to may be set
	| via simple annotations. Here is an example to get you started!
	|
	*/
	/**
	 * @Get("/")
	 */
	public function index()
	{
		$models = \App\Status::raw(function($collection)
		{
		    return $collection->aggregate(
		    	[ '$group' => [ '_id' => '$created_at', 'total' => [ '$sum' => 1 ]]]
		    );
		});

		return $models;
	}

	/**
	 * @Get("/get")
	 */
	public function get()
	{
		/* $m = new \MongoClient(); // connect
		$db = $m->selectDB("hexfic");

		$events = $db->events;

		$events->insert(array("user_id" => '1', 
		    "type" => 'day', 
		    "time" => new \MongoDate(), 
		    "desc" => 'test'));

		// construct map and reduce functions
		$map = new \MongoCode("function() { emit(this.user_id,1); }");
		$reduce = new \MongoCode("function(k, vals) { ".
		    "var sum = 0;".
		    "for (var i in vals) {".
		        "sum += vals[i];". 
		    "}".
		    "return sum; }");

		$sales = $db->command(array(
		    "mapreduce" => "events", 
		    "map" => $map,
		    "reduce" => $reduce,
		    "query" => array("type" => "sale"),
		    "out" => array("merge" => "eventCounts")));

		$users = $db->selectCollection($sales['result'])->find();

		foreach ($users as $user) {
		    echo "{$user['_id']} had {$user['value']} sale(s).\n";
		} */

		/* $comments   = array();
		$comments[] = array(
			'_id' => '17',
            'time'      => '2011-05-10 11:10:00',
            'name'      => 'John Smith',
            'comment'   => 'Test Comment 1'
        );
		$comments[] = array(
			'_id' => '25',
            'time'      => '2011-05-10 11:26:00',
            'name'      => 'David Jones',
            'comment'   => 'Test Comment 2'
        );
		$comments[] = array(
			'_id' => '17',
            'time'      => '2011-05-10 11:26:00',
            'name'      => 'John Smith',
            'comment'   => 'Test Comment 3'
        );

		$grouped = array();
		foreach($comments as $c) {
  			if(!isset($grouped[$c['time']])) {
    			$grouped[$c['time']] = array();
  			}

  			$grouped[$c['time']][] = $c;
		}

		return $grouped; */
		return \Carbon\Carbon::now()->timestamp(1415518558);
		
	}
}