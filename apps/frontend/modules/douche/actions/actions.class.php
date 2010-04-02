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
		$c = new Criteria;
		
		$c->add(DouchePeer::ID, $this->getUser()->getAttribute('already_viewed', array()), Criteria::NOT_IN);
		
		$douche = DouchePeer::retrieveRandom($c);

		if ($douche instanceof Douche) {
			$redirect_to = $douche;
		} else {
			$redirect_to = DouchePeer::retrieveRandom();
		}

		if ($douche instanceof Douche) {
			$this->redirect('douche_view', $redirect_to);
		} else {
			$this->redirect('errors/noUsers');
		}
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

		$viewed = $this->getUser()->getAttribute('already_viewed', array());
		$viewed[$douche->getId()] = $douche->getId();
		$this->getUser()->setAttribute('already_viewed', $viewed);

		$this->douche = $douche;
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$douche = $form->save();
			$name = $douche->getTwitterScreenName();
		} else {
			$params = $request->getParameter($form->getName());
			$name = $params['twitter_screen_name'];
			$douche = DouchePeer::retrieveByTwitterScreenName($name);
		}
		
		if ($douche instanceof Douche && !$douche->isNew()) {
			$this->redirect('douche_view', $douche);
		} else {
			$this->getUser()->setFlash('error', "Yikes! We couldn't find an account on twitter named " . $name . "... sorry :(");
			$this->redirect($request->getReferer());
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
