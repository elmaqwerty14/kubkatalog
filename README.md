### docker build 
```bash
docker-compose up -d
```

### docker rebuild
```bash
docker-compose up -d --force-recreate
```


### stop `kubkatalog_www` container
```bash
docker stop $(docker ps -aqf "name=kubkatalog_www")
```
### remove `kubkatalog_www` container
```bash
docker rm $(docker ps -aqf "name=kubkatalog_www")
```

---

### stop `mysql:5.7.13` container
```bash
docker stop $(docker ps -aqf "name=kubkatalog_db_1")
```
### remove `mysql:5.7.13` container
```bash
docker rm $(docker ps -aqf "name=kubkatalog_db_1")
```

---

### remove `kubkatalog_www` image
```bash
docker rmi $(docker images -q kubkatalog_www) -f
```

---

### remove `mysql` image
```bash
docker rmi $(docker images -q mysql) -f
```