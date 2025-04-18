#!/bin/bash
docker-compose down
# Build the Docker images
docker-compose build

# Start the Docker containers in the background
docker-compose up --build -d