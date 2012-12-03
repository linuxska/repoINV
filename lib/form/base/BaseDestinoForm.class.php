<?php

/**
 * Destino form base class.
 *
 * @method Destino getObject() Returns the current form's model object
 *
 * @package    inv
 * @subpackage form
 * @author     Abraham Rico
 */
abstract class BaseDestinoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'nombre'   => new sfWidgetFormInputText(),
      'telefono' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'telefono' => new sfValidatorString(array('max_length' => 12, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('destino[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Destino';
  }


}
