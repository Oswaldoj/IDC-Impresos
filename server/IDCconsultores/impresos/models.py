from __future__ import unicode_literals
from django.db import models

class Product(models.Model):
	name = models.CharField(max_length=50,unique=True)
	description = models.CharField(max_length=200,null=True)
	pdf = models.FileField(upload_to='pdf/',null=True)
	image = models.ImageField(upload_to='img/',null=True)

class ProductCategory(models.Model):
	name = models.CharField(max_length=50,unique=True)
	description = models.CharField(max_length=200,null=True)
	image = models.ImageField(upload_to='img/',null=True)

class Area(models.Model):
	name = models.CharField(max_length=50,unique=True)
	description = models.CharField(max_length=200,null=True)
	image = models.ImageField(upload_to='img/',null=True)

class Service(models.Model):
	name = models.CharField(max_length=50,unique=True)
	description = models.CharField(max_length=200,null=True)
	pdf = models.FileField(upload_to='pdf/',null=True)
	image = models.ImageField(upload_to='img/',null=True)
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
