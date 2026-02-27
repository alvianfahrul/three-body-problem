#!/bin/bash

# Ganti dengan username Docker Hub Anda
USERNAME="alvianfahrul"

echo "🚀 Memulai proses deployment..."

# 1. Build & Push Frontend
echo "📦 Building Frontend..."
docker build -t $USERNAME/react-frontend:latest ./frontend
docker push $USERNAME/react-frontend:latest

# 2. Restart Deployment di Kubernetes
echo "🔄 Merestart Pod agar menarik image terbaru..."
kubectl rollout restart deployment react-app -n three-body-project

# 3. Pantau status
echo "👀 Memantau status Pod..."
kubectl get pods -n three-body-project -w
