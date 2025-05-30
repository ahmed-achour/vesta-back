"""_keenthemes URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import include, path
from django.conf import settings
from _keenthemes.views import SystemView

urlpatterns = [
    path('admin/', admin.site.urls),

    # Dashboard urls
    path('', include('dashboards.urls')),

    # Auth urls
    path('', include('auth.urls')),
]

handler404 = SystemView.as_view(template_name = 'pages/system/' + settings.KT_THEME + '/not-found.html', status=404)
handler500 = SystemView.as_view(template_name = 'pages/system/' + settings.KT_THEME + '/error.html', status=500)
