#!/bin/bash
# Script para crear bases de datos y procesar cualquier archivo SQL
# Nombre: crear_db.sh

# Recibir parámetros
DB_NAME=$1
DB_USER=$2
DB_PASS=$3
SQL_FILE=$4  # Ruta al archivo SQL a importar

# Credenciales de MySQL root
MYSQL_ROOT="root"
MYSQL_ROOT_PASS="skyvault123"

# Ignoramos la creación de base de datos en el archivo SQL, y la creamos directamente
mysql -u $MYSQL_ROOT -p$MYSQL_ROOT_PASS <<EOF
CREATE DATABASE IF NOT EXISTS \`$DB_NAME\` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';
GRANT ALL PRIVILEGES ON \`$DB_NAME\`.* TO '$DB_USER'@'localhost';
FLUSH PRIVILEGES;
EOF

# Verificar si se proporcionó un archivo SQL
if [ -z "$SQL_FILE" ]; then
    echo "No se proporcionó un archivo SQL. Base de datos creada pero sin tablas."
    exit 0
    fi

# Verificar que el archivo SQL existe
if [ ! -f "$SQL_FILE" ]; then
    echo "Error: El archivo SQL $SQL_FILE no existe."
    exit 1
fi

# Procesar el archivo SQL para manejar correctamente los delimitadores
# Esta solución funciona para el caso del trigger
echo "Importando archivo SQL: $SQL_FILE"
mysql -u $MYSQL_ROOT -p$MYSQL_ROOT_PASS $DB_NAME --delimiter="//" < "$SQL_FILE"

# Verificar si el comando terminó correctamente
if [ $? -eq 0 ]; then
    echo "Base de datos configurada correctamente e importado el archivo SQL"
    exit 0
else
    echo "Error al importar el archivo SQL, intentando método alternativo..."

    # Intentar importar sin usar el delimitador especial
    mysql -u $MYSQL_ROOT -p$MYSQL_ROOT_PASS $DB_NAME < "$SQL_FILE"

    if [ $? -eq 0 ]; then
     exit 0
    else
        echo "Error al importar el archivo SQL con ambos métodos"
        exit 1
    fi
fi

