------------------------------
-- pgDesigner 1.2.17
--
-- Project    : inventario
-- Date       : 12/01/2012 23:40:46.37
-- Description: Hno Emanuel
------------------------------


-- Start Tabla's declaration
CREATE TABLE "producto" (
"id" serial NOT NULL,
"nombre_comercial" character varying(254) NOT NULL,
"formula" character varying(254),
"laboratorio" character varying(254),
"lote" character varying(64),
"caducidad" date,
"piezas" int,
"arriba" int,
"total" int,
"estante" character varying(64),
"precio" float4,
"codigo_barras" character varying(32),
"ubicacion" character varying(64),
"clase" character varying(64)
) WITHOUT OIDS;
ALTER TABLE "producto" ADD CONSTRAINT "producto_pk" PRIMARY KEY("id");
COMMENT ON TABLE "producto" IS 'Producto a trabajar';
COMMENT ON COLUMN "producto"."nombre_comercial" IS 'Nombre del producto';
COMMENT ON COLUMN "producto"."formula" IS 'Formula de la medicina.';
COMMENT ON COLUMN "producto"."laboratorio" IS 'Laboratorio que la produce|';
COMMENT ON COLUMN "producto"."caducidad" IS 'Caducidad del producto';
COMMENT ON COLUMN "producto"."piezas" IS 'Numero de piezas';
COMMENT ON COLUMN "producto"."arriba" IS 'Numero de piezas que hay arriba';
COMMENT ON COLUMN "producto"."total" IS 'Numero de piezas mas arriba.';
COMMENT ON COLUMN "producto"."estante" IS 'Numero de estante';
COMMENT ON COLUMN "producto"."codigo_barras" IS 'Codigo de barras.';
COMMENT ON COLUMN "producto"."clase" IS 'Clase';

CREATE TABLE "compra" (
"id" serial NOT NULL,
"fecha" date,
"id_producto" int NOT NULL,
"factura" character varying(128),
"remision" character varying(64),
"credito" character varying(64),
"piezas" int,
"precio_unitario" float4,
"iva" float4,
"total" float4,
"proveedor" character varying(64)
) WITHOUT OIDS;
ALTER TABLE "compra" ADD CONSTRAINT "compra_pk" PRIMARY KEY("id");
COMMENT ON TABLE "compra" IS 'Compras realizadas';
COMMENT ON COLUMN "compra"."fecha" IS 'Fecha de la compra';
COMMENT ON COLUMN "compra"."id_producto" IS 'id foraneo del producto.';
COMMENT ON COLUMN "compra"."factura" IS 'Factura de la compra';
COMMENT ON COLUMN "compra"."remision" IS 'Remision de la compra';
COMMENT ON COLUMN "compra"."credito" IS 'Numero de credito de la compra';
COMMENT ON COLUMN "compra"."piezas" IS 'Numero de piezas que entran';
COMMENT ON COLUMN "compra"."precio_unitario" IS 'Precio Unitario';
COMMENT ON COLUMN "compra"."iva" IS 'Iva del producto';
COMMENT ON COLUMN "compra"."total" IS 'Total de la compra';

CREATE TABLE "venta" (
"id" serial,
"fecha" date,
"id_producto" int,
"piezas" int,
"factura" character varying(128),
"remision" character varying(128),
"orden_venta" character varying(128),
"id_destino" int,
"id_responsable" int,
"empresa" character varying(64)
) WITHOUT OIDS;
COMMENT ON TABLE "venta" IS 'Tabla de ventas';
COMMENT ON COLUMN "venta"."fecha" IS 'Fecha de la venta.';
COMMENT ON COLUMN "venta"."id_producto" IS 'Producto que se comprara';
COMMENT ON COLUMN "venta"."piezas" IS 'Numero de piezas de producto';
COMMENT ON COLUMN "venta"."factura" IS 'Numero de factura.';
COMMENT ON COLUMN "venta"."remision" IS 'Numero de remision';
COMMENT ON COLUMN "venta"."orden_venta" IS 'Orden de venta';
COMMENT ON COLUMN "venta"."id_destino" IS 'id_destino';

CREATE TABLE "responsable" (
"id" serial NOT NULL,
"nombre" character varying(128),
"apellidos" character varying(128),
"telefono" character varying(12),
"domicilio" character varying(128),
"correo_electronico" character varying(128)
) WITHOUT OIDS;
ALTER TABLE "responsable" ADD CONSTRAINT "responsable_pk" PRIMARY KEY("id");
COMMENT ON COLUMN "responsable"."apellidos" IS 'Apellidos';
COMMENT ON COLUMN "responsable"."telefono" IS 'Telefono responsable';

CREATE TABLE "destino" (
"id" serial NOT NULL,
"nombre" character varying(128),
"telefono" character varying(12)
) WITHOUT OIDS;
ALTER TABLE "destino" ADD CONSTRAINT "destino_pk" PRIMARY KEY("id");
COMMENT ON COLUMN "destino"."telefono" IS 'Telefono responsable';

-- End Tabla's declaration

-- Start Relación's declaration
ALTER TABLE "compra" ADD CONSTRAINT "compra_fkey1" FOREIGN KEY ("id_producto") REFERENCES "producto"("id") ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "venta" ADD CONSTRAINT "venta_fkey1" FOREIGN KEY ("id_responsable") REFERENCES "responsable"("id") ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "venta" ADD CONSTRAINT "venta_fkey2" FOREIGN KEY ("id_destino") REFERENCES "destino"("id") ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "venta" ADD CONSTRAINT "venta_fkey3" FOREIGN KEY ("id_producto") REFERENCES "producto"("id") ON UPDATE CASCADE ON DELETE RESTRICT;

-- End Relación's declaration

