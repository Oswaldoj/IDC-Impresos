from rest_framework import serializers
from IDCconsultores.impresos.models import Product, ProductCategory, Area, Service, SupportService

class ProductSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = Product
		fields = '__all__'

class ProductCategorySerializer(serializers.HyperlinkedModelSerializer):
	products = ProductSerializer(many=True)
	class Meta:
		model = ProductCategory
		fields = '__all__'

class AreaSerializer(serializers.HyperlinkedModelSerializer):
	product_categories = ProductCategorySerializer(many=True)
	class Meta:
		model =  Area
		fields = '__all__'

class ServiceSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = Service
		fields = '__all__'

class SupportServiceSerializer(serializers.HyperlinkedModelSerializer):
	class Meta:
		model = SupportService
		fields = '__all__'
