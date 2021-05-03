FROM mysql/mysql-server:8.0

ENV MYSQL_DATABASE=sauna-share \
  MYSQL_USER=hiroka \
  MYSQL_PASSWORD=hirokawebdbpass \
  MYSQL_ROOT_PASSWORD=hirokawebdbpass \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf