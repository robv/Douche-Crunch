<?php

/**
 * DoucheVote filter form base class.
 *
 * @package    DoucheCrunch
 * @subpackage filter
 * @author     Graham Christensen <graham@grahamc.com>
 */
abstract class BaseDoucheVoteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'douche_id'  => new sfWidgetFormPropelChoice(array('model' => 'Douche', 'add_empty' => true)),
      'submit_ip'  => new sfWidgetFormFilterInput(),
      'vote'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'douche_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Douche', 'column' => 'id')),
      'submit_ip'  => new sfValidatorPass(array('required' => false)),
      'vote'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('douche_vote_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DoucheVote';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'douche_id'  => 'ForeignKey',
      'submit_ip'  => 'Text',
      'vote'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
