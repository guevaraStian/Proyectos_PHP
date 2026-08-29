<h1 style="font-size: 3em; color: #FF0000;">•  PROYECTOS PHP </h1> 

En este repositorio se muestran varios software hechos en el lenguaje de programacion PHP y con diferentes funcionalidades.
Con el fin de poner a funcionar este software hay que sacarle una copia y la carpeta pegarla en el servidor PHP que tengas instalado, luego ingresar al proyecto y abrir el index.php, tambien es necesario tener un motor de base de datos instalado como Mysql.

Luego de tener instalado un motor de bases de datos, podemos ejecutar los siguientes comandos hasta llegar a la carpeta del proyecto y estando ahí ejecutamos los siguientes comandos de consola

```Terminal de comandos
cd
php -v
mysql -V
mysql --version
```

El comando de consola para intalar GIT en cada sistema operativo es el siguiente.

WINDOWS
```Windows
winget install --id Git.Git -e --source winget
```

LINUX, Fedora, Arch Linux, CentOS
```Linux Fedora, Arch Linux, CentOS
sudo dnf install git -y
sudo pacman -S git
sudo yum install git -y
```
MAC
```MAC
brew install git
```


Despues de haber instalado python y confirmar la version, instalamos git y descargamos el proyecto, se puede descargar dando click en el boton verde del gihub y luego en dowload, o luego de descargar git procedemos a ejecutando los siguientes comandos en cualquier sistema operativo a continuacion.

```Terminal de comandos
git --version
git init
git clone https://github.com/guevaraStian/CRUD_Php_MySql.git
cd CRUD_Php_MySql
git push origin master
```
Para ejecutar el codigo se puede descargar los archivos en un servidor y luego ingresar el link con el puerto en el navegador.
```Pagina web
localhost:8000
```
