# -*- coding: utf-8 -*-
from django.core.management.base import BaseCommand
from IDCconsultores.impresos.models import Product, ProductCategory, Area, Service, SupportService
import json
import os

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

	def add_services(self,services):
		for service in services:
			self.add_service(service)

	def add_areas(self,areas,product_categories):
		#each area has a set of product categories
		assert len(areas) == len(product_categories)
		for area,product_category_set in zip(areas,product_categories):
			area_instance , _ =self.add_area(area)

			for product_category in product_category_set:
				product_category_instance, _ = self.add_product_category(product_category)
				product_category_instance.area = area_instance
				product_category_instance.save()

	def deserialize(self,jsonfilepath):
		with open(jsonfilepath) as json_data:
			return json.load(json_data)

	def handle(self, *args, **options):
		services = []
		areas = []
		product_categories = []

		services_jsonfile = 'json/services.json'
		areas_jsonfile = 'json/areas.json'
		product_categories_jsonfile = 'json/product_categories.json'

		commandpath, _ = os.path.split(os.path.abspath(__file__))

		""" Loading json data from resources """
		services_jsonfile = os.path.join(commandpath,services_jsonfile)
		services = self.deserialize(services_jsonfile)

		areas_jsonfile = os.path.join(commandpath,areas_jsonfile)
		areas = self.deserialize(areas_jsonfile)

		product_categories_jsonfile = os.path.join(commandpath,product_categories_jsonfile)
		product_categories = self.deserialize(product_categories_jsonfile)

		self.add_services(services=services)
		self.add_areas(areas=areas,product_categories=product_categories)
