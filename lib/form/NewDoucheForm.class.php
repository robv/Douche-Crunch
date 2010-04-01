<?php

/**
 * Douche form.
 *
 * @package    DoucheCrunch
 * @subpackage form
 * @author     Graham Christensen <graham@grahamc.com>
 */
class NewDoucheForm extends BaseDoucheForm
{
  public function configure()
  {
	  unset($this['submit_ip']);
	  unset($this['twitter_id']);
	  unset($this['image_url']);
	  unset($this['follower_count']);
	  unset($this['latest_tweet']);
	  unset($this['display']);
	  unset($this['created_at']);
	  unset($this['updated_at']);
  }
}
