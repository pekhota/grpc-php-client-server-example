# Dockerfile-app
FROM alpine:latest as build

WORKDIR /app

RUN apk add --no-cache git make musl-dev go bash  && \
    git clone https://github.com/spiral/php-grpc.git

WORKDIR /app/php-grpc

RUN go mod vendor && go build -o rr-grpc  cmd/rr-grpc/main.go && mv ./rr-grpc /usr/local/bin
RUN go build -o protoc-gen-php-grpc cmd/protoc-gen-php-grpc/main.go && mv ./protoc-gen-php-grpc /usr/local/bin

FROM php:8-cli-alpine3.14

COPY --from=build /usr/local/bin/rr-grpc /usr/local/bin/
COPY --from=build /usr/local/bin/protoc-gen-php-grpc /usr/local/bin/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Extensions
RUN apk update
RUN apk add --no-cache g++ autoconf make git zlib-dev bash
RUN apk add $PHPIZE_DEPS libstdc++ zlib-dev linux-headers

RUN pecl install grpc
RUN pecl install protobuf
RUN docker-php-ext-enable grpc
RUN docker-php-ext-enable protobuf

RUN apk add protoc
RUN docker-php-ext-install sockets

ENTRYPOINT /var/www/spiral serve -v -d
