<?php

/**
 * Compra filter form base class.
 *
 * @package    inv
 * @subpackage filter
 * @author     Abraham Rico
 */
abstract class BaseCompraFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_producto'     => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => true)),
      'factura'         => new sfWidgetFormFilterInput(),
      'remision'        => new sfWidgetFormFilterInput(),
      'credito'         => new sfWidgetFormFilterInput(),
      'piezas'          => new sfWidgetFormFilterInput(),
      'precio_unitario' => new sfWidgetFormFilterInput(),
      'iva'             => new sfWidgetFormFilterInput(),
      'total'           => new sfWidgetFormFilterInput(),
      'proveedor'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fecha'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_producto'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Producto', 'column' => 'id')),
      'factura'         => new sfValidatorPass(array('required' => false)),
      'remision'        => new sfValidatorPass(array('required' => false)),
      'credito'         => new sfValidatorPass(array('required' => false)),
      'piezas'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio_unitario' => new sfValidatorPass(array('required' => false)),
      'iva'             => new sfValidatorPass(array('required' => false)),
      'total'           => new sfValidatorPass(array('required' => false)),
      'proveedor'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('compra_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Compra';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'fecha'           => 'Date',
      'id_producto'     => 'ForeignKey',
      'factura'         => 'Text',
      'remision'        => 'Text',
      'credito'         => 'Text',
      'piezas'          => 'Number',
      'precio_unitario' => 'Text',
      'iva'             => 'Text',
      'total'           => 'Text',
      'proveedor'       => 'Text',
    );
  }
}
