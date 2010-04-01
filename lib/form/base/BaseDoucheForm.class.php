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
      'id'             => new sfWidgetFormInputHidden(),
      'submit_ip'      => new sfWidgetFormInputText(),
      'twitter_id'     => new sfWidgetFormInputText(),
      'twitter_name'   => new sfWidgetFormInputText(),
      'image_url'      => new sfWidgetFormInputText(),
      'follower_count' => new sfWidgetFormInputText(),
      'latest_tweet'   => new sfWidgetFormInputText(),
      'display'        => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Douche', 'column' => 'id', 'required' => false)),
      'submit_ip'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'twitter_id'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter_name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image_url'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'follower_count' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'latest_tweet'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display'        => new sfValidatorBoolean(),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('douche[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Douche';
  }


}
