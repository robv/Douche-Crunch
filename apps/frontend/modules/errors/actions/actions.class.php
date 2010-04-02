<?php

/**
 * errors actions.
 *
 * @package    DoucheCrunch
 * @subpackage errors
 * @author     Graham Christensen <graham@grahamc.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class errorsActions extends sfActions {
	public function executeError404(sfWebRequest $request) {
		// :(
	}

	public function executeError500(sfWebRequest $request) {
		// :( :( :(
		// To do these, we have to create PHP files:
		// web/errors/error500.php
		// web/errors/unavailable.php
		// @TODO - do this.
	}

	public function executeNoUsers(sfWebRequest $request) {
		// No users available to display.
	}
}
