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

		var_dump($douche);

		$douche->populateFromTwitter();


		$this->douche = $douche;
		$this->setTemplate('show');
	}

	public function executeNew(sfWebRequest $request) {
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
		$this->douche = $douche;
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$douche = $form->save();

			$this->redirect('douche/edit?id='.$douche->getId());
		}
	}
}
