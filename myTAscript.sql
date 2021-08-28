use pos_dev;

-- home cashier
SELECT m.id,m.nama, m.harga, m.foto,sum(j.jumlah) FROM menu m
INNER JOIN stok_jadi_realtime j ON m.id = j.menu_id
WHERE m.status = 1
GROUP BY m.id;

-- profile
-- owner
SELECT u.id, u.username, u.password, k.nama, k.email,u.level FROM user u
INNER JOIN karyawan k ON k.id = u.karyawan_id
WHERE u.level = 1;
-- all user
SELECT u.id, u.username, u.password, k.nama, k.email FROM user u
INNER JOIN karyawan k ON k.id = u.karyawan_id
WHERE u.level = 2;

-- resep and menu
SELECT m.id, m.nama as menu, group_concat(b.nama) as bahan,group_concat(b.id) as idbahan ,
group_concat(r.jumlah) as jumlah, group_concat(r.id) as idresep 
FROM resep r
INNER JOIN stok_bahan b ON r.stok_bahan_id = b.id
INNER JOIN menu m ON r.menu_id = m.id
group by m.id;

-- available menu for trx
SELECT m.id,m.nama, m.harga, m.foto,sum(j.jumlah) as jumlah FROM menu m
INNER JOIN stok_jadi_realtime j ON m.id = j.menu_id
WHERE j.jumlah > 0
GROUP BY m.id;

-- for transaction later
SELECT m.id as id_menu, j.id as id_stok,m.nama,j.tgl_produksi,j.jumlah FROM menu m
INNER JOIN stok_jadi_realtime j ON m.id = j.menu_id
WHERE j.jumlah > 0
ORDER BY m.id,j.tgl_produksi;

SELECT * FROM stok_jadi_realtime
WHERE jumlah > 0
ORDER BY menu_id,tgl_produksi;

SELECT * FROM stok_jadi;
SELECT * FROM stok_jadi_realtime where menu_id=3;

drop table stok_jadi_realtime;
CREATE TABLE stok_jadi_realtime;

-- create new table for real time stock
CREATE TABLE stok_jadi_realtime SELECT * FROM stok_jadi;

SELECT m.nama as menu, m.harga, sum(d.qty) as qty
FROM transaksi as t
INNER JOIN detail_transaksi as d ON d.transaksi_id = t.id
INNER JOIN menu as m ON d.menu_id = m.id
-- where t.created_at LIKE '%2021-04-03%' //activate if need time filter
group by d.menu_id
order by qty desc;

SELECT m.nama, d.qty -- INSERT(m.nama, 6, 3, ',') as menu, sum(d.qty) 
FROM detail_transaksi as d
INNER JOIN menu as m ON d.menu_id = m.id
WHERE transaksi_id = 202112
group by transaksi_id;

SELECT t.id, t.metode, t.nama, t.no_hp, m.nama as menu, m.harga, d.qty, t.nominal
FROM transaksi as t
INNER JOIN detail_transaksi as d ON d.transaksi_id = t.id
INNER JOIN menu as m ON d.menu_id = m.id
group by d.id
order by t.id desc;

-- menu not in recipe
SELECT m.id,m.nama,r.stok_bahan_id,r.jumlah FROM menu m
left JOIN resep r on r.menu_id=m.id
WHERE r.stok_bahan_id is null;

SELECT * FROM transaksi;
SELECT * FROM detail_transaksi;
SELECT * FROM operasional;
SELECT * FROM resep;
SELECT * FROM menu;
SELECT * FROM stok_jadi;
SELECT * FROM stok_bahan;
SELECT * FROM stok_bahan_detail;
SELECT * FROM user;
SELECT * FROM karyawan;

-- query transaksi 
-- nama, alamat,nominal, metode, status(arrived, otw, waiting for courier)
-- to detail(back work) id menu, id trx, qty, subtotal(harga menu*qty)

-- full list belanja
SELECT b.id, b.nama, d.tgl_beli, d.jumlah, d.qty, d.qty_satuan FROM stok_bahan b
INNER JOIN stok_bahan_detail d ON b.id = d.stok_bahan_id
order by b.id;

-- add column to stok_bahan_detail
ALTER TABLE `stok_bahan_detail` 
ADD `qty` INT NOT NULL AFTER `jumlah`, 
ADD `qty_satuan` ENUM('1','2') NOT NULL AFTER `qty`; 

-- add column porsi to resep
ALTER TABLE `resep` 
ADD `porsi` INT NOT NULL AFTER `id`;

-- 	FINANCE PART
-- income 
SELECT sum(nominal) as total FROM transaksi
WHERE created_at like '2021-04-%'; -- current month
SELECT sum(nominal) as total FROM transaksi
WHERE created_at like '2021-%-%'; -- current year
SELECT sum(nominal) as total, created_at as tgl FROM transaksi
GROUP BY created_at; -- selected date
-- production cost per menu
SELECT m.id, m.nama as menu, sum(r.jumlah) as cost , m.porsi as `porsi`,(sum(r.jumlah)/porsi) as hpp
FROM resep r INNER JOIN menu m ON r.menu_id = m.id
group by m.id;
-- production cost as item sold
SELECT m.id, m.nama as menu, sum(r.jumlah) as cost , m.porsi as `porsi`,
(sum(r.jumlah)/m.porsi) as hpp, d.qty, ((sum(r.jumlah)/m.porsi)*d.qty) as prodcost, d.created_at as `buy date`
FROM resep r INNER JOIN menu m ON r.menu_id = m.id
INNER JOIN detail_transaksi d ON d.menu_id  = m.id
where d.created_at like '2021-04-%'
group by m.id;
-- operasional by month
SELECT keterangan, sum(biaya) as cost, tanggal FROM operasional
WHERE tanggal like '2021-04-%'
group by tanggal;
-- operasional group by month
SELECT keterangan, biaya, tanggal FROM operasional
group by month(tanggal);
-- gaji by production / month
SELECT sum(k.gaji) as total FROM produksi p
INNER JOIN karyawan k ON k.id = p.karyawan_id
WHERE tgl_produksi like '2021-04-%';
SELECT p.tgl_produksi,sum(k.gaji) as gaji FROM produksi p
INNER JOIN karyawan k ON k.id = p.karyawan_id
WHERE tgl_produksi like '2021-04-%'
GROUP BY tgl_produksi;
-- laba total
SELECT x.*, SUM(x.oprcost+x.prodcost) as totalcost, SUM(x.income-(x.oprcost+x.prodcost)) as laba
FROM (SELECT sum(t.nominal) as income,((sum(r.jumlah)/m.porsi)*d.qty) as prodcost, sum(o.biaya) as oprcost , d.created_at as `date`
FROM resep r INNER JOIN menu m ON r.menu_id = m.id
INNER JOIN detail_transaksi d ON d.menu_id  = m.id
JOIN operasional o
JOIN transaksi t
WHERE t.created_at like '2021-04-%' and o. tanggal like '2021-04-%') as x;

SELECT sum(nominal) as total FROM transaksi
WHERE created_at like '2021-04-%';

select * from menu;

SELECT * FROM resep order by menu_id;
SELECT * FROM detail_transaksi;
SELECT * FROM operasional;
-- 
SELECT b.id, b.nama, sum(d.jumlah) as jumlah FROM stok_bahan b
INNER JOIN stok_bahan_detail d ON b.id = d.stok_bahan_id
GROUP by b.id;
          
INSERT INTO transaksi SET
id = 202112,
metode = 'cash',
nominal = 55213,
nama = 'cakra',
no_hp = '08346891344';

INSERT INTO detail_transaksi
SET
id = 202120,
qty = 2,
sub_total = 15000,
transaksi_id = 202112,
menu_id = 2;

INSERT INTO detail_transaksi
SET
id = 202121,
qty = 3,
sub_total = 37300,
transaksi_id = 202112,
menu_id = 3;