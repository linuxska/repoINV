<?php

/**
 * Responsable filter form base class.
 *
 * @package    inv
 * @subpackage filter
 * @author     Abraham Rico
 */
abstract class BaseResponsableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(),
      'apellidos'          => new sfWidgetFormFilterInput(),
      'telefono'           => new sfWidgetFormFilterInput(),
      'domicilio'          => new sfWidgetFormFilterInput(),
      'correo_electronico' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'apellidos'          => new sfValidatorPass(array('required' => false)),
      'telefono'           => new sfValidatorPass(array('required' => false)),
      'domicilio'          => new sfValidatorPass(array('required' => false)),
      'correo_electronico' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('responsable_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Responsable';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'nombre'             => 'Text',
      'apellidos'          => 'Text',
      'telefono'           => 'Text',
      'domicilio'          => 'Text',
      'correo_electronico' => 'Text',
    );
  }
}
