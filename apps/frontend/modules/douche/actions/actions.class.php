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
		$this->redirect('douche_view', $douche);
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

	public function executeConfirm(sfWebRequest $request) {
		$douche = $this->getRoute()->getObject();

		$vote = new DoucheVote();
		$vote->setDouche($douche);
		$vote->setSubmitIp($request->getRemoteAddress());
		$vote->setVote(1);
		$vote->save();
	}

	public function executeDeny(sfWebRequest $request) {
		$douche = $this->getRoute()->getObject();

		$vote = new DoucheVote();
		$vote->setDouche($douche);
		$vote->setSubmitIp($request->getRemoteAddress());
		$vote->setVote(-1);
		$vote->save();
	}

	public function executeShow(sfWebRequest $request) {
		$douche = $this->getRoute()->getObject();
		$this->douche = $douche;
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$douche = $form->save();

			$this->redirect('douche_view', $douche);
		}
	}
}
