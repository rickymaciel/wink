<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

	/**
	 * [success description]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	public function success( $content ) {
		return array('status'=>'ok', 'content'=>$content);
	}

	/**
	 * [error description]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	public function error($content) {
		return array('status'=>'error', 'message'=> $content);
	}
}
