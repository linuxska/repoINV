<?php

/**
 * Producto form base class.
 *
 * @method Producto getObject() Returns the current form's model object
 *
 * @package    inv
 * @subpackage form
 * @author     Abraham Rico
 */
abstract class BaseProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre_comercial' => new sfWidgetFormInputText(),
      'formula'          => new sfWidgetFormInputText(),
      'laboratorio'      => new sfWidgetFormInputText(),
      'lote'             => new sfWidgetFormInputText(),
      'caducidad'        => new sfWidgetFormDate(),
      'piezas'           => new sfWidgetFormInputText(),
      'arriba'           => new sfWidgetFormInputText(),
      'total'            => new sfWidgetFormInputText(),
      'estante'          => new sfWidgetFormInputText(),
      'precio'           => new sfWidgetFormInputText(),
      'codigo_barras'    => new sfWidgetFormInputText(),
      'ubicacion'        => new sfWidgetFormInputText(),
      'clase'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_comercial' => new sfValidatorString(array('max_length' => 254)),
      'formula'          => new sfValidatorString(array('max_length' => 254, 'required' => false)),
      'laboratorio'      => new sfValidatorString(array('max_length' => 254, 'required' => false)),
      'lote'             => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'caducidad'        => new sfValidatorDate(array('required' => false)),
      'piezas'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'arriba'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'total'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'estante'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'precio'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'codigo_barras'    => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'ubicacion'        => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'clase'            => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }


}
