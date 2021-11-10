# https://hub.docker.com/_/microsoft-mssql-server
# https://github.com/twright-msft/mssql-node-docker-demo-app
FROM mcr.microsoft.com/mssql/server:2019-CU13-ubuntu-20.04

# Switch to root user for access to apt-get install
USER root

# Update
RUN apt-get -y update

# Create app directory
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

# Bundle app source
COPY . /usr/src/app

# Grant permissions for the import-data script to be executable
RUN chmod +x /usr/src/app/import-data.sh

# Switch back to mssql user and run the entrypoint script
USER mssql
ENTRYPOINT /bin/bash ./entrypoint.sh