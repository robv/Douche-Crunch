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

		// Retrieve a random individual who they haven't seen
		$already_viewed = $this->getUser()->getAttribute('already_viewed', array());
		$c->add(DouchePeer::ID, $already_viewed, Criteria::NOT_IN);

		$douche = DouchePeer::retrieveRandom($c);
		if ($douche instanceof Douche) {
			$redirect_to = $douche;
		} else {
			// They have seen them all
			// reset the already_viewed record to skip a second query
			$this->getUser()->setAttribute('already_viewed', array());
			$redirect_to = DouchePeer::retrieveRandom();
		}

		// It's possible that we don't have any users
		// in which case, redirect to errors/noUsers
		if ($redirect_to instanceof Douche) {
			$this->redirect('douche_view', $redirect_to);
		} else {
			$this->redirect('errors/noUsers');
		}
	}


	public function executeCreate(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new NewDoucheForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	/**
	 * Confirm that this user is a douche
	 * @param sfWebRequest $request
	 * @return <type>
	 */
	public function executeConfirm(sfWebRequest $request) {
		return $this->processVote($request, true);
	}

	/**
	 * Deny that this user is a douche
	 * @param sfWebRequest $request
	 * @return <type>
	 */
	public function executeDeny(sfWebRequest $request) {
		return $this->processVote($request, false);
	}

	/**
	 * Display a douche
	 * Add them to the already_viewed list
	 * and set the cookie required for voting on this douche
	 *
	 * @param sfWebRequest $request
	 */
	public function executeShow(sfWebRequest $request) {
		$douche = $this->getRoute()->getObject();

		// Add the user to the already_viewed attribute
		// using the douche ID to prevent duplicates in the array
		$viewed = $this->getUser()->getAttribute('already_viewed', array());
		$viewed[$douche->getId()] = $douche->getId();
		$this->getUser()->setAttribute('already_viewed', $viewed);

		// Set the user's attributes and cookie to do some simple
		// spam prevention
		$hash = sha1(uniqid());
		$this->getResponse()->setCookie('dvote', $hash);
		$this->getUser()->setAttribute('dvote_hash', $hash);
		$this->getUser()->setAttribute('dvote_for', $douche->getId());

		$this->douche = $douche;
	}

	/**
	 * Process the creation of a new douche
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 */
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
			$this->getUser()->setFlash('error', "Yikes! Twitter either cut us off, or we couldn't find an account on twitter named " . $name . "... sorry :(");
			$this->redirect($request->getReferer());
		}
	}

	/**
	 * Process a vote for a douche
	 * @param sfWebRequest $request
	 * @param bool $direction true for is a douche, false for not a douche
	 * @return <type>
	 */
	protected function processVote(sfWebRequest $request, $direction) {
		$this->douche = $this->getRoute()->getObject();

		// Check the user's hash and the cookie's hash
		// Then make sure that the hash is valid for this specific douche
		// based upon what they were viewing
		if ($this->getUser()->getAttribute('dvote_hash') != $this->getRequest()->getCookie('dvote')
				|| $this->getUser()->getAttribute('dvote_for') != $this->douche->getId()) {
			$this->forward404('Yikes, that did not want to go, did it?');
		}

		// Overwrite the dvote hash to prevent them from voting on the same person
		// over and over
		$this->getUser()->setAttribute('dvote_hash', null);
		

		if ($direction) {
			$vote_score = 1;
		} else {
			$vote_score = -1;
		}

		// Create the vote for the douche
		$vote = new DoucheVote();
		$vote->setDouche($this->douche);
		$vote->setSubmitIp($request->getRemoteAddress());
		$vote->setVote($vote_score);
		$vote->save();

		$this->direction = (bool) $direction;
		$this->name = $this->douche->getTwitterName();
		$this->upvotes = $this->douche->getUpVotes();
		$this->downvotes = $this->douche->getDownVotes();


		$this->setTemplate('vote');
		return sfView::SUCCESS;
	}
}
