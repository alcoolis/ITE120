SELECT 
c.carousel_ID,
c.title,
c.main_text,
s.photo
FROM carousel c
INNER JOIN site_images s ON s.site_images_ID = c.site_images_ID;