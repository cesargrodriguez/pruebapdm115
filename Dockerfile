# Imagen base oficial de PHP 8.2 con Apache incluido 
FROM php:8.2-apache 

# Instalar extensiones necesarias para trabajar con PDO y MySQL 
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar todos los archivos del proyecto 
# al directorio principal de Apache 
COPY . /var/www/html/ 

# Exponer el puerto 80 para acceso web 
EXPOSE 80
