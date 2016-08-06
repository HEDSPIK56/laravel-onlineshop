-- count product by category
select c.id, c.name, count(p.id) as 'product'
from categories c
INNER JOIN products p
on p.category_id = c.id
where c.deleted_at is null and p.deleted_at is null and c.visible = 'Y' and p.visible = 'Y'
GROUP BY (c.id);

-- end count product by category

