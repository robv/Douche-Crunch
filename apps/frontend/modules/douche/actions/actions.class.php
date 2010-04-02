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
		$this->douche = $this->getRoute()->getObject();

		$vote = new DoucheVote();
		$vote->setDouche($this->douche);
		$vote->setSubmitIp($request->getRemoteAddress());
		$vote->setVote(1);
		$vote->save();
		
		$this->voteArray = $this->getVoteText($this->douche);
	}

	public function executeDeny(sfWebRequest $request) {
		$this->douche = $this->getRoute()->getObject();

		$vote = new DoucheVote();
		$vote->setDouche($this->douche);
		$vote->setSubmitIp($request->getRemoteAddress());
		$vote->setVote(-1);
		$vote->save();
		
		$this->voteArray = $this->getVoteText($this->douche);
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
	
	private function getVoteText($douche) {
		$upvotes = $douche->getUpVotes();
		if ($upvotes == 1)
		{
			$upvotes = '1 person thinks ' . $douche->getTwitterName() . ' is a douche.';
		}
		else
		{
			$upvotes = $upvotes . ' people think ' . $douche->getTwitterName() . ' is a douche.';
		}
		
		$downvotes = $douche->getDownVotes();
		if ($downvotes == 1)
		{
			$downvotes = '1 stupid person thinks ' . $douche->getTwitterName() . ' isn\'t a douche. Really?';
		}
		else
		{
			$downvotes = $downvotes . ' stupid people think ' . $douche->getTwitterName() . ' isn\'t a douche. Really?';
		}
		return array('up'=>$upvotes, 'down'=>$downvotes);
	}
}
