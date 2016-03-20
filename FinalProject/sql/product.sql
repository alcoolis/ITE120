SELECT 
m.name AS 'name',
m.price AS 'price',
m.engine_ID AS 'engine_ID',
m.chassis_ID AS 'chassis_ID',
m.dimensions_ID AS 'dimensions_ID',
m.capacity_ID AS 'capacity_ID',
p.photo AS 'photo'
FROM motos m
INNER JOIN product_images p ON p.moto_ID=m.moto_ID
WHERE m.product_number=564576846435;
