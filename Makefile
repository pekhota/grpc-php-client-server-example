
proto-gen:
	mkdir -p ./golang-client/proto
	protoc -I=./proto/ --go-grpc_out=./golang-client/proto --go_out=./golang-client/proto ./proto/calculator.proto
