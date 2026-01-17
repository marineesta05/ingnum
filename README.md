# Service 1 : 
## 1.Installation
La version Java JDK 21 etait deja installee sur ma machine.

## 2. Tester le programme sans docker

Builder le projet : 

```bash
./gradlew build
```

Tester le projet :
```bash
java -jar build/libs/RentalService-0.0.1-SNAPSHOT.jar
```

### 3. Creation du fichier Dockerfile 
Creer le fichier Dockerfile dans le dossier RentalService

```bash
FROM eclipse-temurin:21

VOLUME /tmp

EXPOSE 8080

ADD ./build/libs/RentalService-0.0.1-SNAPSHOT.jar app.jar

ENTRYPOINT ["java","-Djava.security.egd=file:/dev/./urandom","-jar","/app.jar"]
```

## 4. Creation de l'image Docker
Lancer la création de l’image Docker :

```bash
docker build –t rentalservice .
```

## 5. Tester le programme avec Docker 

```bash
docker run –p 8080:8080 rentalservice
```

Vérifier dans votre navigateur à l’adresse : 

[http://localhost:8080/bonjour]

## 6. Publier l'image dans Docker Hub

Se connecter au Docker Hub

```bash
docker login
```

Faire un tag de l'image :

```bash
docker tag rentalservice marineesta/rentalservice:latest
```

Faire un push de l'image dans le Hub:

```bash
docker push marineesta/rentalservice:latest
```

# Service 2

## 1. Creer le dossier 
A la racine du projet, creer le dossier prenomService

```bash
mkdir prenomService
cd prenomService
```
##  2. Creer le fichier php
Dans le dossier index.php, creer un fichier index.php

```bash
<?php
header('Content-Type: application/json');
$name = isset($_GET['name']) ? $_GET['name'] : 'Unknown';

$response = [
    'name' => $name,  
    'service' => 'prenomService',
    'timestamp' => date('Y-m-d H:i:s')
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
```

### 3. Creation du fichier Dockerfile 
Creer le fichier Dockerfile dans le dossier prenomService

```bash
FROM php:8.2-apache

COPY index.php /var/www/html/

RUN rm -f /var/www/html/index.html

EXPOSE 80

CMD ["apache2-foreground"]
```

## 4. Creation de l'image Docker
Lancer la création de l’image Docker (toujours dans le dossier prenomService):

```bash
docker build –t nameservice .
```

## 5. Tester le programme avec Docker 

```bash
docker run –p 8082:8080 nameservice
```

Vérifier dans votre navigateur à l’adresse : 

[http://localhost:8082]

## 6. Publier l'image dans Docker Hub

Se connecter au Docker Hub

```bash
docker login
```

Faire un tag de l'image :

```bash
docker tag nameesrvice marineesta/nameservice:latest
```

Faire un push de l'image dans le Hub:

```bash
docker push marineesta/nameservice:latest
```
