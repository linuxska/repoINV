<?php

/**
 * Venta form base class.
 *
 * @method Venta getObject() Returns the current form's model object
 *
 * @package    inv
 * @subpackage form
 * @author     Abraham Rico
 */
abstract class BaseVentaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'fecha'          => new sfWidgetFormDate(),
      'id_producto'    => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => true)),
      'piezas'         => new sfWidgetFormInputText(),
      'factura'        => new sfWidgetFormInputText(),
      'remision'       => new sfWidgetFormInputText(),
      'orden_venta'    => new sfWidgetFormInputText(),
      'id_destino'     => new sfWidgetFormPropelChoice(array('model' => 'Destino', 'add_empty' => true)),
      'id_responsable' => new sfWidgetFormPropelChoice(array('model' => 'Responsable', 'add_empty' => true)),
      'empresa'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'fecha'          => new sfValidatorDate(array('required' => false)),
      'id_producto'    => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id', 'required' => false)),
      'piezas'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'factura'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'remision'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'orden_venta'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'id_destino'     => new sfValidatorPropelChoice(array('model' => 'Destino', 'column' => 'id', 'required' => false)),
      'id_responsable' => new sfValidatorPropelChoice(array('model' => 'Responsable', 'column' => 'id', 'required' => false)),
      'empresa'        => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('venta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venta';
  }


}
