Php loging silly application.

Docker installation for testing:
from  
$docker-compose up -d
$ docker exec -i db sh -c 'mysql \
-uroot -p"$MYSQL_ROOT_PASSWORD"' < $(pwd)/db/proto.sql 
