<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$agent = $this->request->getUserAgent();

		if ($agent->isBrowser())
		{
			$currentAgent = $agent->getBrowser().' '.$agent->getVersion();
		}
		elseif ($agent->isRobot())
		{
			$currentAgent = $this->agent->robot();
		}
		elseif ($agent->isMobile())
		{
			$currentAgent = $agent->getMobile();
		}
		else
		{
			$currentAgent = 'Unidentified User Agent';
		}

		if ($agent->getPlatform() == "Android") {
			return view('android');
		} elseif ($agent->getPlatform() == "iOS") {
			return view('ios');
		} else {
			return view('other');
		}
	}
}
