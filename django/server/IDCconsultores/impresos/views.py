from django.shortcuts import render
from rest_framework import viewsets
from IDCconsultores.impresos.models import Product, ProductCategory, Area, Service, SupportService
from IDCconsultores.impresos.serializers import ProductSerializer, ProductCategorySerializer, AreaSerializer, ServiceSerializer, SupportServiceSerializer

class ProductViewSet(viewsets.ModelViewSet):
	""" API endpoint that allows products to be viewed or edited."""
	queryset = Product.objects.all()
	serializer_class = ProductSerializer


class ProductCategoryViewSet(viewsets.ModelViewSet):
	""" API endpoint that allows product categories to be viewed or edited. """
	queryset = ProductCategory.objects.all()
	serializer_class = ProductCategorySerializer

class AreaViewSet(viewsets.ModelViewSet):
	""" API endpoint that allows areas to be viewed or edited."""
	queryset = Area.objects.all()
	serializer_class = AreaSerializer

class ServiceViewSet(viewsets.ModelViewSet):
	""" API endpoint that allows services to be viewed or edited."""
	queryset = Service.objects.all()
	serializer_class = ServiceSerializer

class SupportServiceViewSet(viewsets.ModelViewSet):
	""" API endpoint that allows support service to be viewed or edited."""
	queryset = SupportService.objects.all()
	serializer_class = SupportServiceSerializer
