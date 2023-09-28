from django.contrib import admin
from .models import Jokoa
from .models import Egilea

# Register your models here.
class JokoaAdmin(admin.ModelAdmin):
    list_display = ['izenburua','deskribapena','kategoria','egilea']
    list_filter = ['kategoria']
    search_fields = ['izenburua','deskribapena','egilea']

admin.site.register(Jokoa,JokoaAdmin)

class EgileaAdmin(admin.ModelAdmin):
    list_display = ['izena','emaila']
    search_fields = ['izena','emaila']

admin.site.register(Egilea,EgileaAdmin)