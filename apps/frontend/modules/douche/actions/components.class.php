<?php
class DoucheComponents extends sfComponents {
	public function executeLeaderboard(sfWebRequest $request) {
		$this->douches = DouchePeer::getMostDouchey();
	}

	public function executeNew(sfWebRequest $request) {
		$douche = new Douche();
		$douche->setSubmitIp($request->getRemoteAddress());

		$this->form = new NewDoucheForm($douche);
	}
}