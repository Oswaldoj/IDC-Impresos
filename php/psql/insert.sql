\connect impresos idcconsultores 127.0.0.1
-- AREA
INSERT INTO impresos_area(name,description,image) VALUES('Publicidad y Mercadeo','',NULL);
INSERT INTO impresos_area(name,description,image) VALUES('Editorial','',NULL);
INSERT INTO impresos_area(name,description,image) VALUES('Eventos','',NULL);
INSERT INTO impresos_area(name,description,image) VALUES('Empresarial','',NULL);

-- PRODUCT CATEGORY AREA Publicidad y Mercadeo
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Folletos',NULL,'',id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Catálogos','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Afiches','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Volantes','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Calendarios','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Dipticos','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Tripticos','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Encuestas','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Despligables','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Habladores','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Colgantes','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Cupones','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Chapas','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Mouse Pad','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Marca libros','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Posavasos','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Desprendibles','',NULL,id FROM impresos_area where name='Publicidad y Mercadeo';

-- PRODUCT CATEGORY AREA Editorial
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Pendones',NULL,'',id FROM impresos_area where name='Editorial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Backing',NULL,'',id FROM impresos_area where name='Editorial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Libros',NULL,'',id FROM impresos_area where name='Editorial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Cuadernos',NULL,'',id FROM impresos_area where name='Editorial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Libretas',NULL,'',id FROM impresos_area where name='Editorial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Agendas',NULL,'',id FROM impresos_area where name='Editorial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Revistas',NULL,'',id FROM impresos_area where name='Editorial';

-- PRODUCT CATEGORY AREA Eventos
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Invitaciones',NULL,'',id FROM impresos_area where name='Eventos';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Notas de prensa',NULL,'',id FROM impresos_area where name='Eventos';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Programas de mano',NULL,'',id FROM impresos_area where name='Eventos';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Diplomas',NULL,'',id FROM impresos_area where name='Eventos';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Certificados',NULL,'',id FROM impresos_area where name='Eventos';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Identificadores',NULL,'',id FROM impresos_area where name='Eventos';

-- PRODUCT CATEGORY AREA Empresarial
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Tarjetas de presentación',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id)
	SELECT 'Talonarios:Facturas, Nota de entrega, Notas debito, Notas Crédito, Papelería en general',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Carpetas',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Sobres',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Etiquetas',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Menúes',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Door Hangers',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Recipes',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Historias médicas',NULL,'',id FROM impresos_area where name='Empresarial';
INSERT INTO impresos_productcategory(name,description,image,area_id) 
	SELECT 'Control de citas',NULL,'',id FROM impresos_area where name='Empresarial';

-- SERVICE
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Asesoría','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Imposición y Montaje','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Desarrollo de empaques','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Gestión de color para impresos','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Desarrollo de troqueles','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Supervisión de procesos de impresión','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Impresión Digital (Índigo/Xerox)','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Impresión Offset (Litografía)','',NULL,NULL);
INSERT INTO impresos_service(name,description,pdf,image) VALUES('Impresión Gran Formato','',NULL,NULL);


-- SUPPORT SERVICE 
INSERT INTO impresos_supportservice(service_id,subservice_id)
	SELECT superservice.id,subservice.id FROM impresos_service superservice, impresos_service subservice
			WHERE superservice.name='Asesoría' AND subservice.name='Imposición y Montaje';
INSERT INTO impresos_supportservice(service_id,subservice_id)
	SELECT superservice.id,subservice.id FROM impresos_service superservice, impresos_service subservice
			WHERE superservice.name='Asesoría' AND subservice.name='Desarrollo de empaques';
INSERT INTO impresos_supportservice(service_id,subservice_id)
	SELECT superservice.id,subservice.id FROM impresos_service superservice, impresos_service subservice
			WHERE superservice.name='Asesoría' AND subservice.name='Gestión de color para impresos';
INSERT INTO impresos_supportservice(service_id,subservice_id)
	SELECT superservice.id,subservice.id FROM impresos_service superservice, impresos_service subservice
			WHERE superservice.name='Asesoría' AND subservice.name='Desarrollo de troqueles';
INSERT INTO impresos_supportservice(service_id,subservice_id)
	SELECT superservice.id,subservice.id FROM impresos_service superservice, impresos_service subservice
			WHERE superservice.name='Asesoría' AND subservice.name='Supervisión de procesos de impresión';
