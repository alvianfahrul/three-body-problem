FROM golang:1.22-alpine

WORKDIR /app

# copy semua source code
COPY . .

# copy env example ke env
RUN cp .env.example .env

# rapikan dependency
RUN go mod tidy

# expose port (ubah jika perlu)
EXPOSE 8080

# jalankan aplikasi
CMD ["go", "run", "main.go"]
