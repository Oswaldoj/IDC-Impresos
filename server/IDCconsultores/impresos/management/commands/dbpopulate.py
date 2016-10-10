# -*- coding: utf-8 -*-
from django.core.management.base import BaseCommand
from IDCconsultores.impresos.models import Service, SupportService, Area, ProductCategory

class Command(BaseCommand):
	args = 'No args'
	help = 'Populates Database with initial data'

	def report_creation(self,modelname,instancename,is_instance_created):
		is_created_msg = "Created" if is_instance_created else ">NOT Created"
		print "\t%s - %s: %s" %(is_created_msg,modelname,instancename)

	def add_service(self,service_data):
		service , created = Service.objects.get_or_create(name=service_data['name'])
		for subservice_data in service_data['subservices']:
			subservice,_ = self.add_service(subservice_data)
			supports_service,_ = SupportService.objects.get_or_create(service=service,subservice=subservice)
		self.report_creation('Service',service.name,created)
		return (service,created)

	def add_area(self,area_data):
		area , created = Area.objects.get_or_create(name=area_data['name'])
		self.report_creation('Area',area.name,created)
		return (area,created)

	def add_product_category(self,product_category_data):
		product_category , created = ProductCategory.objects.get_or_create(name=product_category_data['name'])
		self.report_creation('Product Category',product_category.name,created)
		return (product_category,created)

	def add_services(self):
		print "Adding services ..."
		services= [ 
			{ 'name':'Asesoría',
			  'subservices': [
				{ 'name': 'Imposición y Montaje', 'subservices':[]},
				{ 'name':'Desarrollo de empaques', 'subservices':[]},
				{ 'name':'Gestión de color para impresos', 'subservices':[]},
				{ 'name':'Desarrollo de troqueles', 'subservices':[]},
				{ 'name':'Supervisión de procesos de impresión', 'subservices':[]},
			]},
			{ 'name':'Impresión Digital (Índigo/Xerox)', 'subservices':[]},
			{ 'name':'Impresión Offset (Litografía)', 'subservices':[]},
			{ 'name':'Impresión Gran Formato','subservices':[]}
		]

		for service in services:
			self.add_service(service)

	def add_areas(self):
		print "Adding areas ..."
		areas = [
			{ 'name':'Publicidad y Mercadeo'},
			{ 'name':'Editorial'},
			{ 'name':'Eventos'},
			{ 'name':'Empresarial'}
		]

		for area in areas:
			self.add_area(area)

	def add_product_categories(self):
		print "Adding Product Categories ..."
		product_categories = [
			{ 'name':'Folletos'},
			{ 'name':'Catálogos'},
			{ 'name':'Afiches'},
			{ 'name':'Volantes'},
			{ 'name':'Calendarios'},
			{ 'name':'Dipticos'},
			{ 'name':'Tripticos'},
			{ 'name':'Encuestas'},
			{ 'name':'Despligables'},
			{ 'name':'Habladores'},
			{ 'name':'Colgantes'},
			{ 'name':'Cupones'},
			{ 'name':'Chapas'},
			{ 'name':'Mouse Pad'},
			{ 'name':'Marca libros'},
			{ 'name':'Posavasos'},
			{ 'name':'Desprendibles'},
			{ 'name':'Pendones'},
			{ 'name':'Backing'},
			{ 'name':'Libros'},
			{ 'name':'Cuadernos'},
			{ 'name':'Libretas'},
			{ 'name':'Agendas'},
			{ 'name':'Revistas'},
			{ 'name':'Invitaciones'},
			{ 'name':'Notas de prensa'},
			{ 'name':'Programas de mano'},
			{ 'name':'Diplomas'},
			{ 'name':'Certificados'},
			{ 'name':'Identificadores'},
			{ 'name':'Pendones'},
			{ 'name':'Backing'},
			{ 'name':'Tarjetas de presentación'},
			{ 'name':'Talonarios:Facturas, Nota de entrega, Notas debito, Notas Crédito, Papelería en general'},
			{ 'name':'Carpetas'},
			{ 'name':'Sobres'},
			{ 'name':'Etiquetas'},
			{ 'name':'Menúes'},
			{ 'name':'Door Hangers'},
			{ 'name':'Recipes'},
			{ 'name':'Historias médicas'},
			{ 'name':'Control de citas'}
		]
		for product_category in product_categories:
			self.add_product_category(product_category)

	def handle(self, *args, **options):
		self.add_services()
		self.add_areas()
		self.add_product_categories()
