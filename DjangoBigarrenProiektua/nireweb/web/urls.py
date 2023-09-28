from . import views
from django.urls import path

urlpatterns = [
    path('',views.index,name='index'),
    path('jokoak/',views.jokoa_list,name='jokoak'),
    path('egileak/',views.egilea_list,name='egileak'),
    path('addjokoa/',views.addjokoa,name="addjokoa"),
    path('addjokoa/addjokoberria/',views.addjokoberria,name="addjokoberria"),
    path('addegilea/',views.addegilea,name="addegilea"),
    path('addegilea/addegileberria/',views.addegileberria,name="addegileberria"),
    path('egileak/deleteegilea/<int:egilea_id>',views.deleteegilea,name='deleteegilea'),
    path('jokoak/deletejokoa/<int:jokoa_id>',views.deletejokoa,name='deletejokoa'),
    path('egileak/updateegilea/<int:egilea_id>',views.updateegilea,name='updateegilea'),
    path('egileak/updateegilea/<int:egilea_id>/egileaaldatu/',views.egilealdatu,name='egileaaldatu'),
    path('jokoak/updatejokoa/<int:jokoa_id>',views.updatejokoa,name='updatejokoa'),
    path('jokoak/updatejokoa/<int:jokoa_id>/jokoaaldatu/',views.jokoaaldatu,name='jokoaaldatu')
]