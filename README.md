## Bienvenido a **Baristopia**

### Instalación y Ejecución
#### 1. Clonar el repositorio:

```
git clone https://github.com/nceballosp/Baristopia.git
```

#### 2. Instalar Dependencias:

```
composer install
```

#### 3. Configurar la base de datos
Duplicar el archivo .env.example y renombrarlo como .env.

Luego, generar la clave de aplicación:

```
php artisan key:generate
```

#### 4. Configurar la base de datos

Editar .env con los datos de la base de datos mysql.

Luego, ejecutar:

```
php artisan migrate
```

Tambien, para que se guarden las imagenes correctamente, ejecutar:

```
php artisan storage:link
```

#### 5. Ejecutar el servidor
Por ultimo, ejecutar:

```
php artisan serve
```

La aplicación estará disponible en http://127.0.0.1:8000/


### Rutas Principales
| Sección | Ruta |
| --- | --- |
| *Inicio* | / |
| *Productos* | /product |
| *Recetas* | /recipe |
| *Detalle de Producto* | /product/{id} |
| *Detalle de la Receta* | /receta/{id} |
| *Carrito* | /cart |
| *Panel de Administrador* | /baristopia |


