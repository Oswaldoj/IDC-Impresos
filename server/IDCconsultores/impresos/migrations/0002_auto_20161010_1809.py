# -*- coding: utf-8 -*-
# Generated by Django 1.10 on 2016-10-10 18:09
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('impresos', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='area',
            name='description',
            field=models.CharField(max_length=200, null=True),
        ),
        migrations.AlterField(
            model_name='area',
            name='image',
            field=models.ImageField(null=True, upload_to='img/'),
        ),
        migrations.AlterField(
            model_name='product',
            name='description',
            field=models.CharField(max_length=200, null=True),
        ),
        migrations.AlterField(
            model_name='product',
            name='image',
            field=models.ImageField(null=True, upload_to='img/'),
        ),
        migrations.AlterField(
            model_name='product',
            name='pdf',
            field=models.FileField(null=True, upload_to='pdf/'),
        ),
        migrations.AlterField(
            model_name='productcategory',
            name='description',
            field=models.CharField(max_length=200, null=True),
        ),
        migrations.AlterField(
            model_name='productcategory',
            name='image',
            field=models.ImageField(null=True, upload_to='img/'),
        ),
        migrations.AlterField(
            model_name='service',
            name='description',
            field=models.CharField(max_length=200, null=True),
        ),
        migrations.AlterField(
            model_name='service',
            name='image',
            field=models.ImageField(null=True, upload_to='img/'),
        ),
        migrations.AlterField(
            model_name='service',
            name='pdf',
            field=models.FileField(null=True, upload_to='pdf/'),
        ),
    ]
