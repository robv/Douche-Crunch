<?php

/**
 * DoucheVote form base class.
 *
 * @method DoucheVote getObject() Returns the current form's model object
 *
 * @package    DoucheCrunch
 * @subpackage form
 * @author     Graham Christensen <graham@grahamc.com>
 */
abstract class BaseDoucheVoteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'douche_id'  => new sfWidgetFormPropelChoice(array('model' => 'Douche', 'add_empty' => false)),
      'submit_ip'  => new sfWidgetFormInputText(),
      'vote'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'DoucheVote', 'column' => 'id', 'required' => false)),
      'douche_id'  => new sfValidatorPropelChoice(array('model' => 'Douche', 'column' => 'id')),
      'submit_ip'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'vote'       => new sfValidatorString(array('max_length' => 4)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('douche_vote[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DoucheVote';
  }


}
