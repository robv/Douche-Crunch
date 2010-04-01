<?php


/**
 * Skeleton subclass for representing a row from the 'douche' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Thu Apr  1 14:06:29 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Douche extends BaseDouche {

	/**
	 * Initializes internal state of Douche object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	public function __toString() {
		return $this->getTwitterName();
	}

} // Douche
