#!/bin/bash

# Ganti dengan username Docker Hub Anda
USERNAME="alvianfahrul"

echo "🚀 Memulai proses deployment..."

# 1. Build & Push Laravel
echo "📦 Building Laravel..."
docker build -t $USERNAME/laravel-api:latest ./laravel
docker push $USERNAME/laravel-api:latest

# 2. Restart Deployment di Kubernetes
echo "🔄 Merestart Pod agar menarik image terbaru..."
kubectl rollout restart deployment laravel-app -n three-body-project

# 3. Pantau status
echo "👀 Memantau status Pod..."
kubectl get pods -n three-body-project -w
