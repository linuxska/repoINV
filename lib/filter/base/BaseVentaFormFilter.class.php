<?php

/**
 * Venta filter form base class.
 *
 * @package    inv
 * @subpackage filter
 * @author     Abraham Rico
 */
abstract class BaseVentaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_producto'    => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => true)),
      'piezas'         => new sfWidgetFormFilterInput(),
      'factura'        => new sfWidgetFormFilterInput(),
      'remision'       => new sfWidgetFormFilterInput(),
      'orden_venta'    => new sfWidgetFormFilterInput(),
      'id_destino'     => new sfWidgetFormPropelChoice(array('model' => 'Destino', 'add_empty' => true)),
      'id_responsable' => new sfWidgetFormPropelChoice(array('model' => 'Responsable', 'add_empty' => true)),
      'empresa'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fecha'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_producto'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Producto', 'column' => 'id')),
      'piezas'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'factura'        => new sfValidatorPass(array('required' => false)),
      'remision'       => new sfValidatorPass(array('required' => false)),
      'orden_venta'    => new sfValidatorPass(array('required' => false)),
      'id_destino'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Destino', 'column' => 'id')),
      'id_responsable' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Responsable', 'column' => 'id')),
      'empresa'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('venta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venta';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'fecha'          => 'Date',
      'id_producto'    => 'ForeignKey',
      'piezas'         => 'Number',
      'factura'        => 'Text',
      'remision'       => 'Text',
      'orden_venta'    => 'Text',
      'id_destino'     => 'ForeignKey',
      'id_responsable' => 'ForeignKey',
      'empresa'        => 'Text',
    );
  }
}
