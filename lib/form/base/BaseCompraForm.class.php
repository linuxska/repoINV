<?php

/**
 * Compra form base class.
 *
 * @method Compra getObject() Returns the current form's model object
 *
 * @package    inv
 * @subpackage form
 * @author     Abraham Rico
 */
abstract class BaseCompraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'fecha'           => new sfWidgetFormDate(),
      'id_producto'     => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => false)),
      'factura'         => new sfWidgetFormInputText(),
      'remision'        => new sfWidgetFormInputText(),
      'credito'         => new sfWidgetFormInputText(),
      'piezas'          => new sfWidgetFormInputText(),
      'precio_unitario' => new sfWidgetFormInputText(),
      'iva'             => new sfWidgetFormInputText(),
      'total'           => new sfWidgetFormInputText(),
      'proveedor'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'fecha'           => new sfValidatorDate(array('required' => false)),
      'id_producto'     => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id')),
      'factura'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'remision'        => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'credito'         => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'piezas'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'precio_unitario' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'iva'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'total'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'proveedor'       => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('compra[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Compra';
  }


}
