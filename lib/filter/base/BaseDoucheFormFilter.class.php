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
      'submit_ip'           => new sfWidgetFormFilterInput(),
      'twitter_id'          => new sfWidgetFormFilterInput(),
      'twitter_screen_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'twitter_name'        => new sfWidgetFormFilterInput(),
      'twitter_protected'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'twitter_followers'   => new sfWidgetFormFilterInput(),
      'twitter_tweets'      => new sfWidgetFormFilterInput(),
      'twitter_friends'     => new sfWidgetFormFilterInput(),
      'twitter_verified'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'twitter_description' => new sfWidgetFormFilterInput(),
      'image_url'           => new sfWidgetFormFilterInput(),
      'latest_tweet'        => new sfWidgetFormFilterInput(),
      'display'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'submit_ip'           => new sfValidatorPass(array('required' => false)),
      'twitter_id'          => new sfValidatorPass(array('required' => false)),
      'twitter_screen_name' => new sfValidatorPass(array('required' => false)),
      'twitter_name'        => new sfValidatorPass(array('required' => false)),
      'twitter_protected'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'twitter_followers'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'twitter_tweets'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'twitter_friends'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'twitter_verified'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'twitter_description' => new sfValidatorPass(array('required' => false)),
      'image_url'           => new sfValidatorPass(array('required' => false)),
      'latest_tweet'        => new sfValidatorPass(array('required' => false)),
      'display'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'id'                  => 'Number',
      'submit_ip'           => 'Text',
      'twitter_id'          => 'Text',
      'twitter_screen_name' => 'Text',
      'twitter_name'        => 'Text',
      'twitter_protected'   => 'Boolean',
      'twitter_followers'   => 'Number',
      'twitter_tweets'      => 'Number',
      'twitter_friends'     => 'Number',
      'twitter_verified'    => 'Boolean',
      'twitter_description' => 'Text',
      'image_url'           => 'Text',
      'latest_tweet'        => 'Text',
      'display'             => 'Boolean',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
