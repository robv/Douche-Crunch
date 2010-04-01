<?php

/**
 * Douche filter form base class.
 *
 * @package    DoucheCrunch
 * @subpackage filter
 * @author     Graham Christensen <graham@grahamc.com>
 */
abstract class BaseDoucheFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'submit_ip'      => new sfWidgetFormFilterInput(),
      'twitter_id'     => new sfWidgetFormFilterInput(),
      'twitter_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_url'      => new sfWidgetFormFilterInput(),
      'follower_count' => new sfWidgetFormFilterInput(),
      'latest_tweet'   => new sfWidgetFormFilterInput(),
      'display'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'submit_ip'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'twitter_id'     => new sfValidatorPass(array('required' => false)),
      'twitter_name'   => new sfValidatorPass(array('required' => false)),
      'image_url'      => new sfValidatorPass(array('required' => false)),
      'follower_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'latest_tweet'   => new sfValidatorPass(array('required' => false)),
      'display'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('douche_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Douche';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'submit_ip'      => 'Number',
      'twitter_id'     => 'Text',
      'twitter_name'   => 'Text',
      'image_url'      => 'Text',
      'follower_count' => 'Number',
      'latest_tweet'   => 'Text',
      'display'        => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
