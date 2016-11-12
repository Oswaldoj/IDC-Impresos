\connect impresos idcconsultores 127.0.0.1

-- Product Area
CREATE TABLE IF NOT EXISTS impresos_area (
	id SERIAL NOT NULL PRIMARY KEY, 
	name varchar(50) NOT NULL UNIQUE, 
	description varchar(200) NULL, 
	image varchar(100) NULL --file url
);


-- Product Categories
CREATE TABLE IF NOT EXISTS impresos_productcategory (
	id SERIAL NOT NULL PRIMARY KEY, 
	name varchar(100) NOT NULL UNIQUE, 
	description varchar(200) NULL, 
	image varchar(100) NULL, --file url
	area_id integer NULL REFERENCES impresos_area (id)
);
CREATE INDEX impresos_productcategory_area_idx ON impresos_productcategory (area_id);


-- Products
CREATE TABLE IF NOT EXISTS impresos_product (
	id SERIAL NOT NULL PRIMARY KEY, 
	name varchar(50) NOT NULL UNIQUE, 
	description varchar(200) NULL, 
	pdf varchar(100) NULL, --file url
	image varchar(100) NULL,  --file url
	product_category_id integer NULL REFERENCES impresos_productcategory (id)
);
CREATE INDEX impresos_product_productcategory_idx ON impresos_product (product_category_id);


-- Product Service
CREATE TABLE IF NOT EXISTS impresos_service (
	id SERIAL NOT NULL PRIMARY KEY, 
	name varchar(50) NOT NULL UNIQUE,
	description varchar(200) NULL, 
	pdf varchar(100) NULL, --file url
	image varchar(100) NULL --file url
);


-- Product Support Service
CREATE TABLE IF NOT EXISTS impresos_supportservice (
	id SERIAL NOT NULL PRIMARY KEY, 
	service_id integer NOT NULL REFERENCES impresos_service (id),
	subservice_id integer NOT NULL REFERENCES impresos_service (id)
);

CREATE INDEX impresos_supportservice_superservice_idx ON impresos_supportservice (service_id);
CREATE INDEX impresos_supportservice_subservice_idx ON impresos_supportservice (subservice_id);
