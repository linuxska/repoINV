<?php

/**
 * Producto filter form base class.
 *
 * @package    inv
 * @subpackage filter
 * @author     Abraham Rico
 */
abstract class BaseProductoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_comercial' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'formula'          => new sfWidgetFormFilterInput(),
      'laboratorio'      => new sfWidgetFormFilterInput(),
      'lote'             => new sfWidgetFormFilterInput(),
      'caducidad'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'piezas'           => new sfWidgetFormFilterInput(),
      'arriba'           => new sfWidgetFormFilterInput(),
      'total'            => new sfWidgetFormFilterInput(),
      'estante'          => new sfWidgetFormFilterInput(),
      'precio'           => new sfWidgetFormFilterInput(),
      'codigo_barras'    => new sfWidgetFormFilterInput(),
      'ubicacion'        => new sfWidgetFormFilterInput(),
      'clase'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_comercial' => new sfValidatorPass(array('required' => false)),
      'formula'          => new sfValidatorPass(array('required' => false)),
      'laboratorio'      => new sfValidatorPass(array('required' => false)),
      'lote'             => new sfValidatorPass(array('required' => false)),
      'caducidad'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'piezas'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'arriba'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estante'          => new sfValidatorPass(array('required' => false)),
      'precio'           => new sfValidatorPass(array('required' => false)),
      'codigo_barras'    => new sfValidatorPass(array('required' => false)),
      'ubicacion'        => new sfValidatorPass(array('required' => false)),
      'clase'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre_comercial' => 'Text',
      'formula'          => 'Text',
      'laboratorio'      => 'Text',
      'lote'             => 'Text',
      'caducidad'        => 'Date',
      'piezas'           => 'Number',
      'arriba'           => 'Number',
      'total'            => 'Number',
      'estante'          => 'Text',
      'precio'           => 'Text',
      'codigo_barras'    => 'Text',
      'ubicacion'        => 'Text',
      'clase'            => 'Text',
    );
  }
}
