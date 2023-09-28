from django.db import models

# Create your models here.

class Egilea(models.Model):
    izena = models.CharField(max_length=100)
    emaila = models.CharField(max_length=100)
    
class Jokoa(models.Model):
    izenburua = models.CharField(max_length=100)
    deskribapena = models.TextField()
    kategoria = models.CharField(max_length=50)
    egilea = models.ForeignKey(Egilea,on_delete=models.CASCADE)


