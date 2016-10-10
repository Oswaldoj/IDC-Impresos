from __future__ import unicode_literals
from django.db import models

class Product(models.Model):
	name = models.CharField(max_length=50)
	description = models.CharField(max_length=200)
	pdf = models.FileField(upload_to='pdf/')
	image = models.ImageField(upload_to='img/')

class ProductCategory(models.Model):
	name = models.CharField(max_length=50)
	description = models.CharField(max_length=200)
	image = models.ImageField(upload_to='img/')

class Area(models.Model):
	name = models.CharField(max_length=50)
	description = models.CharField(max_length=200)
	image = models.ImageField(upload_to='img/')

class Service(models.Model):
	name = models.CharField(max_length=50)
	description = models.CharField(max_length=200)
	pdf = models.FileField(upload_to='pdf/')
	image = models.ImageField(upload_to='img/')
	subservices = models.ManyToManyField(
		'self',
		symmetrical=False,
		through='SupportService',
		through_fields=('service', 'subservice'),
		)

class SupportService(models.Model):
	service = models.ForeignKey(Service,related_name="super_services")
	subservice = models.ForeignKey(Service,related_name="supported_services")
	unique_together = ('service', 'subservice')
