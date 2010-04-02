<?php

/**
 * Douche form base class.
 *
 * @method Douche getObject() Returns the current form's model object
 *
 * @package    DoucheCrunch
 * @subpackage form
 * @author     Graham Christensen <graham@grahamc.com>
 */
abstract class BaseDoucheForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'submit_ip'           => new sfWidgetFormInputText(),
      'twitter_id'          => new sfWidgetFormInputText(),
      'twitter_screen_name' => new sfWidgetFormInputText(),
      'twitter_name'        => new sfWidgetFormInputText(),
      'twitter_protected'   => new sfWidgetFormInputCheckbox(),
      'twitter_followers'   => new sfWidgetFormInputText(),
      'twitter_tweets'      => new sfWidgetFormInputText(),
      'twitter_friends'     => new sfWidgetFormInputText(),
      'twitter_verified'    => new sfWidgetFormInputCheckbox(),
      'twitter_description' => new sfWidgetFormInputText(),
      'image_url'           => new sfWidgetFormInputText(),
      'latest_tweet'        => new sfWidgetFormInputText(),
      'display'             => new sfWidgetFormInputCheckbox(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'Douche', 'column' => 'id', 'required' => false)),
      'submit_ip'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'twitter_id'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter_screen_name' => new sfValidatorString(array('max_length' => 255)),
      'twitter_name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter_protected'   => new sfValidatorBoolean(),
      'twitter_followers'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'twitter_tweets'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'twitter_friends'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'twitter_verified'    => new sfValidatorBoolean(),
      'twitter_description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image_url'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latest_tweet'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display'             => new sfValidatorBoolean(),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Douche', 'column' => array('twitter_id'))),
        new sfValidatorPropelUnique(array('model' => 'Douche', 'column' => array('twitter_screen_name'))),
      ))
    );

    $this->widgetSchema->setNameFormat('douche[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Douche';
  }


}
