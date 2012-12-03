<?php

/**
 * Responsable form base class.
 *
 * @method Responsable getObject() Returns the current form's model object
 *
 * @package    inv
 * @subpackage form
 * @author     Abraham Rico
 */
abstract class BaseResponsableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInputText(),
      'apellidos'          => new sfWidgetFormInputText(),
      'telefono'           => new sfWidgetFormInputText(),
      'domicilio'          => new sfWidgetFormInputText(),
      'correo_electronico' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'apellidos'          => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'telefono'           => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'domicilio'          => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'correo_electronico' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('responsable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Responsable';
  }


}
