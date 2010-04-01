<?php

/**
 * douche actions.
 *
 * @package    DoucheCrunch
 * @subpackage douche
 * @author     Graham Christensen <graham@grahamc.com>
 */
class doucheActions extends sfActions {
	public function executeIndex(sfWebRequest $request) {
		$douche = DouchePeer::retrieveRandom();

		$this->douche = $douche;

		$this->redirect('@douche_view?twitter_screen_name=' . $this->douche->getTwitterScreenName());
	}

	public function executeNew(sfWebRequest $request) {
		$douche = new Douche();
		$douche->setSubmitIp($request->getRemoteAddress());

		$this->form = new NewDoucheForm();
	}

	public function executeCreate(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new NewDoucheForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeShow(sfWebRequest $request) {
		$douche = $this->getRoute()->getObject();
		$douche->updateAllFromTwitter();
		$douche->save();
		$this->douche = $douche;
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$douche = $form->save();

			$this->redirect('@douche_view?twitter_screen_name='.$douche->getTwitterScreenName());
		}
	}
}
