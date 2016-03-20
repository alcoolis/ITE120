SELECT 
c.color
FROM colors c,moto_color mc,motos m
WHERE c.color_ID = mc.color_ID 
AND mc.moto_ID = m.moto_ID 
AND m.name = 'Yamaha YZF R1';
