from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.urls import reverse
from .models import Egilea,Jokoa
# Create your views here.

def index(request):
    return render(request,'index.html')

def jokoa_list(request):
    jokoak = Jokoa.objects.all
    return render(request,'jokoak.html',{'jokoak':jokoak})

def egilea_list(request):
    egileak = Egilea.objects.all
    return render(request,'egileak.html',{'egileak':egileak})


def addjokoa(request):
    egileak = Egilea.objects.all
    return render(request,'addjokoa.html',{'egileak':egileak})

def addjokoberria(request):
    iz = request.POST['izenburua']
    des = request.POST['deskribapena']
    kat = request.POST['kategoria']
    eg = request.POST['egilea']
    egilea = Egilea.objects.get(izena=eg)

    jokoberria = Jokoa(izenburua=iz,deskribapena=des,kategoria=kat,egilea=egilea)
    jokoberria.save()
    return HttpResponseRedirect(reverse('jokoak'))

def addegilea(request):
    return render(request,'addegilea.html')

def addegileberria(request):
    iz = request.POST['izena']
    em = request.POST['emaila']
    
    egileberria = Egilea(izena=iz,emaila=em)
    egileberria.save()
    return HttpResponseRedirect(reverse('egileak'))

def deleteegilea(request,egilea_id):
    egilea = Egilea.objects.get(id=egilea_id)
    egilea.delete()
    return HttpResponseRedirect(reverse('egileak'))

def deletejokoa(request,jokoa_id):
    jokoa = Jokoa.objects.get(id=jokoa_id)
    jokoa.delete()
    return HttpResponseRedirect(reverse('jokoak'))

def updateegilea(request,egilea_id):
    egilea = Egilea.objects.get(id=egilea_id)
    return render(request,'updateegilea.html',{'egilea':egilea})

def egilealdatu(request,egilea_id):
    iz = request.POST['izena']
    em = request.POST['emaila']
    egilea = Egilea.objects.get(id=egilea_id)
    egilea.izena = iz
    egilea.emaila = em
    egilea.save()
    return HttpResponseRedirect(reverse('egileak'))

def updatejokoa(request,jokoa_id):
    jokoa = Jokoa.objects.get(id=jokoa_id)
    egileak = Egilea.objects.all
    return render(request,'updatejokoa.html',{'jokoa':jokoa,'egileak':egileak})

def jokoaaldatu(request,jokoa_id):
    iz = request.POST['izenburua']
    des = request.POST['deskribapena']
    kat = request.POST['kategoria']
    eg = request.POST['egilea']
    egilea = Egilea.objects.get(izena=eg)

    jokoa = Jokoa.objects.get(id=jokoa_id)
    jokoa.izenburua = iz
    jokoa.deskribapena = des
    jokoa.kategoria = kat
    jokoa.egilea = egilea
    jokoa.save()
    return HttpResponseRedirect(reverse('jokoak'))

