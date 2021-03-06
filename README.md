# Database Management 

##### Build Status: ![](https://www.github.com/manguilar22/WebDev/workflows/CD-docker/badge.svg)

### UTEP Style Guide 

[UTEP Style Guides](https://www.utep.edu/university-communications/resources/graphic-identity-guide.html)
                   

### Directory Structure 

* **.github/workflows/docker.yaml**
* **assignments/** 
* **public/**
* **Dockerfile** 
* **docker-compose.yaml** 

### Deploy 

#### Linux / Unix 

```bash 
$ export VERSION=DOCKER
$ export MYSQL_HOST=<IP_ADDRESS>
$ export MYSQL_USER=<USERNAME>
$ export MYSQL_PASSWORD=<PASSWORD>
$ export MYSQL_DATABASE=<DATABASE NAME> 
```

#### Start php-cli

```bash
$ php -t public/ -S 127.0.0.1:8080 
```

#### Docker Compose 

```bash 
$ docker-compose up -d 
```

#### Kubernetes deployments 

``` bash
$ kubectl apply -f k8s/mysql-deploy.yaml 
$ kubectl apply -f k8s/php-deploy.yaml
```
