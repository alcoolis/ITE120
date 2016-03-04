CREATE VIEW favorites AS
SELECT
motos.name AS 'name',
motos.product_number AS 'product_number',
product_images.photo AS 'photo',
engine.Displacement AS 'engine',
colors.color AS 'color'
FROM motos, product_images, engine, colors

WHERE
product_images.moto_ID = motos.moto_ID
AND
engine.engine_ID = motos.engineID
AND
product_images.color_ID = colors.color_ID;
