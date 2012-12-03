<?php

/**
 * Destino filter form base class.
 *
 * @package    inv
 * @subpackage filter
 * @author     Abraham Rico
 */
abstract class BaseDestinoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'   => new sfWidgetFormFilterInput(),
      'telefono' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'   => new sfValidatorPass(array('required' => false)),
      'telefono' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('destino_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Destino';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'nombre'   => 'Text',
      'telefono' => 'Text',
    );
  }
}
