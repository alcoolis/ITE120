CREATE VIEW supersport AS 
SELECT 
m.name AS 'name',
m.product_number AS 'product_number',
e.Displacement AS 'engine',
p.photo AS 'photo',
c.color AS 'color'
FROM motos m
INNER JOIN engine e ON m.engine_ID=e.engine_ID
INNER JOIN product_images p ON p.moto_ID=m.moto_ID
INNER JOIN colors c ON p.moto_ID=m.moto_ID AND c.color_ID=p.color_ID
WHERE m.type='Supersport';
